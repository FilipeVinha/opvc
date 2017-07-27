<?php

namespace App\Http\Controllers;

use App\API;
use App\Category;
use App\Event;
use App\Local;
use App\Occurrence;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class APIController extends Controller
{
    public function appLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            if (Hash::check($request->input('password'), $user->getAttribute('password'))) {
                $token = csrf_token();
                $api = new API();
                $api->setAttribute('token', $token);
                $api->setAttribute('user_id', $user->getAttribute('id'));
                $api->save();
                $response = csrf_token() . " " . $user->getAttribute('id');
                return $response;
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

    public function newEvent(Request $request)
    {
        $userId = $request->input('user_id');
        $address = $request->input('address');
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $local = $request->input('local');
        $subCat = $request->input('subcat');
        $obs = $request->input('observations');


        $occr = Occurrence::where('occurrence', $subCat)->first();
        $lcl = Local::where('local', $local)->first();
        //ir buscar timestamp

        $event = new Event();
        $event->setAttribute("user_id", $userId);
        $event->setAttribute("address", $address);
        $event->setAttribute("lat", $lat);
        $event->setAttribute("lng", $lon);
        $event->setAttribute("occurrence_id", $occr->getAttribute('id'));
        $event->setAttribute("local_id", $lcl->getAttribute('id'));
        $event->setAttribute("obs", $obs);
        $event->save();


        //Ler as photos
        $nPhotos = $request->input('n_photos');
        $photos = array();
        for ($i = 0; $i < $nPhotos; $i++) {
            $photos[] = $request->input('photo_' . $i);
        }

        for ($i = 0; $i < $nPhotos; $i++) {

            $new_image = base64_decode($photos[$i]);
            $date = microtime();
            $photo = new Photo();
            $image_name = $date . '.png';
            $path = public_path() . "/storage/events/" . $image_name;
            file_put_contents($path, $new_image);
            $photo->setAttribute('event_id', $event->id);
            $photo->setAttribute('photo', $image_name);
            $photo->save();

            unset($path, $image_name,$date);
        }


        return "1";

    }
}
