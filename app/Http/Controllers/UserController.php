<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserConfirmRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\profileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{

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
        $user->name = $request->name;
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('sysdbatest');
        $user->auth_level = 1;
        $user->banned = 0;
        $user->save();

        $this->sendResetLinkEmail($request);
        return redirect()->back();
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response;
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }


}
