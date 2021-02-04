<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Spatie\QueryBuilder\QueryBuilder;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'jbk' => [],
            'konzola' => [],
            'opstina' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:9'],
            'number_of_rent' => [],
            'money_spent' => ['required'],
            'comment' => ['required', 'min:3'],
            'reservations' => []
        ]);

        Customer::create($attributes);

        notify()->success('Customer created sucessfully');

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Reservation $reservation)
    {
        $customerReservations = $reservation->where('customer_id', $customer->id)->get();

        return view('customers.show', compact('customer', 'customerReservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update(request(['name','opstina','phone_number','address','comment','number_of_rent','money_spent']));

        notify()->success('Customer updated sucessfully');

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        notify()->success('Customer removed sucessfully');

        return redirect('/customers');
    }

    public function import()
    {
    Excel::import(new CustomerImport, 'customers.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function importShow()
    {
        return view('customers.import');
    }

    public function filter(Request $request)
    {

        if($request->has('name')){
            $customer = Customer::where('name', $request->name);
        }
        if($request->has('jbk')){
            $customer = Customer::where('jbk', $request->jbk);
        }
        // Search for a customer based on their name.

        var_dump($customer);
    }

}
