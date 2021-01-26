<?php

namespace App\Http\Controllers;

use App\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class SearchController extends Controller
{
    
    public function test(){

        $result = QueryBuilder::for(Customer::class)
            ->allowedFilters('name')
            ->get();
                return $result;


        return view('test');

    }
}