<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Channels\NexmoSmsChannel;
use Illuminate\Notifications\Messages\NexmoMessage;
use Nexmo\Laravel\Facade\Nexmo;
use Nexmo\Client\Credentials\Basic;


class SmsController extends Controller
{
    public function sendMessage()
    {

        $basic  = new \Nexmo\Client\Credentials\Basic('5447e022', 'v9JHm5ylagQYEJNB');
        $client = new \Nexmo\Client($basic);

        Nexmo::message()->send([
            'to'  => '+381649772676',
            'from' => '+381600699994',
            'text' => 'Test message'
        ]);

        return "success";
    }
}
