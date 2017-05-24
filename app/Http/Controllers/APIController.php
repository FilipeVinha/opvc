<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;

class APIController extends Controller
{
    public function appLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            if (Hash::check($request->input('password'), $user->getAttribute('password'))) {
                return csrf_token();
            }
        }
        return "-1";
    }
}
