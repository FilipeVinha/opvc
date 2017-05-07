<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function appLogin(Request $request)
    {

        return 'hello';
//        $user = User::where('username', $request->username)->first();
//        if ($user != null) {
//            $password = bcrypt($request->password);
//            if ($user->password == $password)
//                return csrf_token();
//        }
//        return false();
    }
}
