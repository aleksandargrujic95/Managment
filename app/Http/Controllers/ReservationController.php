<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reservation $reservation, Customer $customer)
    {
        $reservations = $reservation->where('active', 0)->get();

        return view('/reservations.index', compact('reservations'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll(Reservation $reservation)
    {
        $reservations = $reservation->all();

        return view('/reservations/all', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reservation $reservation, Request $request, Product $product)
    {
        date_default_timezone_set('Europe/Belgrade');
        $today = Carbon::now();
        $date_of_rent =  Carbon::parse($reservation->date_of_rent)->format('Y-m-d');
        $date_of_return =   Carbon::parse($reservation->date_of_giveback)->format('Y-m-d');
        $DeferenceInDays = Carbon::parse($today)->diffInDays($reservation->date_of_giveback, false);
        $today_parsed = Carbon::parse($today)->format('Y-m-d');
        $customer_id = $request->customer_id;
        $customer = DB::select('select * from customers where id =' . $customer_id);
        $products = Product::where('rented', 1)->get();


        return view('/reservations.create' , compact('today_parsed','customer_id', 'customer', 'products'));
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
            'product_id' => ['required'],
            'date_of_rent' => ['required'],
            'date_of_return' => ['required'],
            'price' => ['required'],
            'active' => ['required'],
            'customer_id' => ['required']
        ]);

        $today = Carbon::now();
        $date_of_return =  Carbon::parse($request->date_of_rent)->format('Y-m-d');

        if($date_of_return < $today ){
            $attributes['active'] =  1;
        }

        Reservation::create($attributes);
        $customer_id = $request->input('customer_id');
        $product_id = $request->input('product_id');
        $customer = DB::select('select * from customers where id =' . $customer_id);
        
        $money_updated = $customer[0]->money_spent + $request->input('price');
        $rent_number = $customer[0]->number_of_rent + 1;

        DB::table('customers')
                    ->where('id', '=', $customer_id)
                    ->update(['money_spent' => $money_updated, 'number_of_rent' => $rent_number]);

        if($date_of_return > $today ){
            DB::table('products')
                    ->where('id', '=', $product_id)
                    ->update(['rented' => 0]); 
        }else{
            DB::table('products')
                    ->where('id', '=', $product_id)
                    ->update(['rented' => 1]);
        }         

        notify()->success('Reservation created sucessfully');

        return redirect('/reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact($reservation));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact($reservation));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request([
            'product_id' => ['required'],
            'date_of_rent' => ['required'],
            'date_of_return' => ['required'],
            'customer_id' => ['required']
        ]);

        $reservation->update($request->all());

        notify()->success('Reservation updated sucessfully');

        return redirect('/reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $customer_id = $reservation->customer_id;
        $customer = DB::select('select * from customers where id =' . $customer_id);

        $money_updated = $customer[0]->money_spent -= $reservation->price;

        if($money_updated <= 0){
            $money_updated = 0;
        }

        DB::table('customers')
                    ->where('id', '=', $customer_id)
                    ->update(['money_spent' => $money_updated]);
        
        DB::table('products')
                    ->where('id', '=', $reservation->product_id)
                    ->update(['rented' => 1]);

        $reservation->delete();

        notify()->success('Reservation removed sucessfully');

        return redirect('/reservations');
    }



}
