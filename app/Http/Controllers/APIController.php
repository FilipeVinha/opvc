<?php

namespace App\Http\Controllers;

use App\Category;
use App\Local;
use App\Occurrence;
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

    public function getCategories(Request $request)
    {
        return Category::all();
    }

    public function getSubCategories(Request $request)
    {
        $cat_name = $request->input('category');
        $cat = Category::where('category', $cat_name)->first();
        $subCats = Occurrence::where('category_id', $cat->getAttribute('id')->get());
        return $subCats;
    }

    public function getLocals(Request $request)
    {
        return Local::all();
    }
}
