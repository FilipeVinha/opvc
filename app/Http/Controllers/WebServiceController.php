<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class WebServiceController extends Controller
{
    public function removeUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }

    public function appLogin(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user != null) {
            $password = bcrypt($request->password);
            if ($user->password == $password)
                return csrf_token();
        }
        return false();
    }
}
