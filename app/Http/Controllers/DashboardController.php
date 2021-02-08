<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Reservation;
// use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Customer $customer, Product $product, Category $category, Reservation $reservation)
    {

        $customers_numb = Customer::count();
        $products_numb = Product::count();
        $categories_numb = Category::count();
        $reservations_numb = Reservation::count();
        $notifications_numb = Notification::count();

        // $orders = Reservation::select(
        //     DB::raw('sum(price) as sums'), 
        //     DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
        //     DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
        // )
        // ->groupBy('months', 'monthKey')
        // ->orderBy('created_at', 'ASC')
        // ->get();
        
        // $data = [0,0,0,0,0,0,0,0,0,0,0,0];

        // foreach($orders as $order){
        //     $data[$order->monthKey-1] = $order->sums;
        // }


        // $chart = (new LarapexChart)->setType('line')
        //     ->setTitle('Total Reservations Monthly')
        //     ->setSubtitle('From January to December')
        //     ->setXAxis([
        //         'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        //     ])
        //     ->setDataset([
        //         [
        //             'name'  =>  'Reservations',
        //             'data'  =>  [$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11]]
        //         ]
        //     ])
        // ;

        return view('index', compact('customers_numb','reservations_numb','products_numb','categories_numb', 'notifications_numb'));

    }

    public function sidebar()
    {
        $categories = Category::all();

        return view('layout', compact('categories'));
    }
}
