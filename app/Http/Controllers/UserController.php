<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Validator;
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

    public function profileUser(Request $request)
    {

        if (isset($request->password)) {
            $validator = Validator::make($request->all(), [
                'password' => 'confirmed|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->toArray()]);
            }
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
        }


        $profile = Profile::where('user_id', Auth::user()->id)->first();
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

//        return json_encode($profile);

        return response()->json(['success' => true, 'profile' => $profile]);

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

        DB::table('password_resets')->insert(
            ['email' => $user->email, 'token' => $token]
        );
        $user->notify(new newAccount($token));

        return redirect()->back();
    }

    public function passowrdCreateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $password_request = DB::table('password_resets')->where('email', '=', $request->email)->select('token', 'created_at')->orderBy('created_at', 'DESC')->first();
        if (isset($password_request)) {
            if ($request->token == $password_request->token) {
                $now = Carbon::now('Europe/London');
                $time = Carbon::createFromFormat('Y-m-d H:i:s', $password_request->created_at, 'Europe/London');
                $length = $time->diffInMinutes($now);
                if ($length < 25) {
                    $user = User::where('email', $request->email)->first();
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return redirect('/login');
                }
            }
        }

        $validator->errors()->add('email', 'Token is not valid');
        return redirect()->back()->withErrors($validator);
    }


}
