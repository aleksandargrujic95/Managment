<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Avatar;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer, Request $request)
    {
        $avatar = new Avatar();

        $customers = Customer::orderBy('id', 'asc')->paginate(5);

        return view('customers.index', compact('customers','avatar'));
    }

    public function loyal(Customer $customer, Request $request)
    {
        $avatar = new Avatar();  

        $silver_customers_count = $customer->where('money_spent', '>=', 20000)->where('money_spent', '<' , 30000 )->count();

        $gold_customers_count = $customer->where('money_spent', '>=', 30000)->where('money_spent', '<' , 50000 )->count();

        $platinum_customers_count = $customer->where('money_spent', '>=', 50000)->where('money_spent', '<' , 100000 )->count();

        $diamond_customers_count = $customer->where('money_spent', '>=', 100000)->count();

        return view('customers.loyal', compact('silver_customers_count','diamond_customers_count','gold_customers_count','avatar','platinum_customers_count'));
    }

    public function membership(Customer $customer, Request $request)
    {
        $avatar = new Avatar(); 

        $id = $request->membership;

        if($id == 1){
            $customers = $customer->where('money_spent', '>=', 20000)->where('money_spent', '<' , 30000 )->get();
        }elseif($id == 2){
            $customers = $customer->where('money_spent', '>=', 30000)->where('money_spent', '<' , 50000 )->get();
        }elseif ($id == 3) {
            $customers = $customer->where('money_spent', '>=', 50000)->where('money_spent', '<' , 100000 )->get();
        }else{
            $customers = $customer->where('money_spent', '>=', 100000)->get();
        }
        return view('customers.membership', compact('avatar','customers'));
    }


    public function test()
    {

        return view('customers.test');
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
             'place' => ['required', 'min:3'],
             'address' => ['required', 'min:3'],
             'name' => ['required', 'min:3'],
             'phone_number' => ['required', 'min:9'],
             'number_of_rent' => [],
            'money_spent' => ['required'],
             'comment' => [],
             'find_us' => [],
             'referal_points' => [],
             'address2' => [],
             'phone_number2' => []
        ]);
        if($request->referal_id != null){
            $referal = DB::select('select * from customers where id =' . $request->referal_id);
            var_dump($referal);
            $referal_points = $referal[0]->referal_points + 10;
            DB::table('customers')
                    ->where('id', '=', $request->referal_id)
                    ->update(['referal_points' => $referal_points]);
        }

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
        $avatar = new Avatar();

        $customerReservations = $reservation->where('customer_id', $customer->id)->get();

        return view('customers.show', compact('customer', 'customerReservations', 'avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
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
            
        $customer->update(request(['name','place','phone_number','address','comment','number_of_rent','money_spent','referal_points','find_us','address2','phone_number2']));

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

    public function search(Request $request)
    {
        $avatar = new Avatar();

        $customers_filtered = Customer::filter($request->all())->get();

        return view('customers.search' , compact('customers_filtered', 'avatar'));
    }

}
