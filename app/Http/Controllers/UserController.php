<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserConfirmRequest;
use App\Notifications\newAccount;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\profileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{

    public function centerMapUser(Request $request)
    {
        $profile = Profile::find($request->user);
        $profile->lat = $request->lat;
        $profile->lon = $request->lon;
        $profile->save();

    }

    public function profileUser(profileRequest $request)
    {
        $profile = Profile::find(Auth::user()->id);
        if ($profile == null) {
            $profile = new Profile;
            $profile->user_id = Auth::user()->id;
        }
        $profile->address = $request->address;
        $profile->postalcode = $request->postalcode;
        $profile->city = $request->city;
        $profile->contact = $request->contact;
        $profile->lang = $request->lang;
        if ($request->hasFile('photo')) {
            $profile->photo = $request->photo->store('profile');
        }
        $profile->save();

        return json_encode($profile);

    }


    public function confirmtUser(UserConfirmRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
    }

    public function createtUser(UserRequest $request)
    {
        $user = new User();
        $profile = new Profile();
        $user->name = $request->name;
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('sysdbatest');
        $user->auth_level = 1;
        $user->banned = 0;
        $user->save();
        $profile->lat = config('config.lat');
        $profile->lon = config('config.lon');
        $profile->user_id = $user->id;
        $profile->save();

        $token = csrf_token();
        $user->notify(new newAccount($token));

        return redirect()->back();
    }


}
