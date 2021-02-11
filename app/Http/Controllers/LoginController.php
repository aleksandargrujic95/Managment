<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    // some other functions go here

    protected function authenticated(Request $request, $user)
    {
        // to admin dashboard
        if($user->isAdmin()) {
            return redirect(route('/'));
        }

        // to user dashboard
        else if($user->isUser()) {
            return redirect(route('/welcome'));
        }

        abort(404);
    }
}
