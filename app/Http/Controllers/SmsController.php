<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function sendMessage()
    {
        Nexmo::message()->send([
            'to'  => '381649772676',
            'from' => '381600699994',
            'text' => 'Test message'
        ]);

        return "success";
    }
}
