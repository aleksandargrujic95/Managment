<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Reservation;


class DashboardController extends Controller
{
    public function index(Customer $customer, Product $product, Category $category, Reservation $reservation)
    {

        $customers_numb = Customer::count();
        $products_numb = Product::count();
        $categories_numb = Category::count();
        $reservations_numb = Reservation::count();
        $notifications_numb = Notification::count();

        return view('index', compact('customers_numb','reservations_numb','products_numb','categories_numb', 'notifications_numb'));

    }

    public function sidebar()
    {
        $categories = Category::all();

        return view('layout', compact('categories'));
    }
}
