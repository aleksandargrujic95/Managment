<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function sendMessage()
    {
        Nexmo::message()->send([
            'to'  => '0600699994',
            'from' => '0600699994',
            'text' => 'Test message'
        ]);

        return "success";
    }
}
