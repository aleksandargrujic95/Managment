<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
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
        $reservations = $reservation->paginate(10);

        return view('/reservations/all', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reservation $reservation, Request $request, Product $product, Category $category)
    {
        date_default_timezone_set('Europe/Belgrade');
        $today = Carbon::now();
        $date_of_rent =  Carbon::parse($reservation->date_of_rent)->format('Y-m-d');
        $date_of_return =   Carbon::parse($reservation->date_of_giveback)->format('Y-m-d');
        $DeferenceInDays = Carbon::parse($today)->diffInDays($reservation->date_of_giveback, false);
        $today_parsed = Carbon::parse($today)->format('Y-m-d');
        $customer_id = $request->customer_id;
        $customer = DB::select('select * from customers where id =' . $customer_id);
        $products = Product::where('rented', 1)->orderBy('id', 'asc')->get();
        $categories = $category->all();


        return view('/reservations.create' , compact('today_parsed','customer_id', 'customer', 'products','categories'));
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
            'price' => ['required'],
            'active' => ['required'],
            'customer_id' => ['required'],
            'comment' => [],
            'other_prod_2' => [],
            'other_prod_1' => [],
            'deliverer' => [],
            'joystick' => []
        ]);
        
        $gratis = $request->gratis;
        if($gratis){
            $attributes['price'] = 0;
        }else{
            $attributes['price'] = $request->price;
        }
        $today = Carbon::now();    
        $return = (new Carbon($request->date_of_rent))->addDays($request->number_of_days);
        $date_of_return =  Carbon::parse($return)->format('Y-m-d');

        if($date_of_return < $today ){
            $attributes['active'] =  1;
        }

        $attributes['date_of_return'] = $return;

        Reservation::create($attributes);

        //Update
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
    public function edit(Category $category, Request $request, Reservation $reservation)
    {
        $today = Carbon::now();

        $products = Product::where('rented', 1)->orderBy('id', 'asc')->get();
        $today_parsed = Carbon::parse($today)->format('Y-m-d');
        $categories = $category->all();
        $reservation = $reservation;

        return view('reservations.edit', compact('today_parsed', 'products','categories','reservation'));
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

        $today = Carbon::now();    
        $return = (new Carbon($request->date_of_rent))->addDays($request->number_of_days);
        $date_of_return =  Carbon::parse($return)->format('Y-m-d');
        

        if($date_of_return < $today ){
            $active =  1;
        }
        $product_id = $request->input('product_id');
        $gratis = $request->input('gratis');
        if($gratis){
            $request->price = 0;
        }else{
            $request->price = $request->price;
        }
        $customer_id = $request->input('customer_id');

        $reservation->update(request([
            'product_id',
            'date_of_rent',
            'date_of_return',
            'price',
            'active',
            'customer_id',
            'joystick',
            'other_prod_1',
            'other_prod_1',
            'deliverer',
            'comment'
        ]));

        //Update
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

        DB::table('customers')
                    ->where('id', '=', $customer[0]->id)
                    ->update(['number_of_rent' => $customer[0]->number_of_rent - 1]);

        $reservation->delete();

        notify()->success('Reservation removed sucessfully');

        return back();
    }



}
