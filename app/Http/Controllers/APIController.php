<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
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
        $subCats = Occurrence::where('category_id', $cat->getAttribute('id'))->get();
        return $subCats;
    }

    public function getLocals(Request $request)
    {
        return Local::all();
    }

    public function newEvent(Request $request){
        $userId = $request->input('user_id');
        $addr   = $request->input('address');
        $lat    = $request->input('lat');
        $lon    = $request->input('lon');
        $local  = $request->input('local');
        $cat    = $request->input('category');
        $subCat = $request->input('subcat');
        $obs    = $request->input('observations');
        //falta as fotos

        //ir buscar subCat_id
        $occr = Occurrence::where('occurrence',$subCat);
        $lcl = Local::where('local',$local);
        //ir buscar localType_id
        //ir buscar timestamp

        $event = new Event();
        $event->setAttribute("user_id", $userId);
        $event->setAttribute("address", $addr);
        $event->setAttribute("lat", $lat);
        $event->setAttribute("lng", $lon);
        $event->setAttribute("occurrence_id", $occr->getAttribute('occurrence_id'));
        $event->setAttribute("local_id", $subCat);
        $event->setAttribute("obs", $obs);

        $event->save();
        return "1";

    }
}
