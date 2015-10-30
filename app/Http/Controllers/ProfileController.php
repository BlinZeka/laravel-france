<?php

namespace LaravelFrance\Http\Controllers;

use Illuminate\Http\Request;

use LaravelFrance\Http\Requests;
use LaravelFrance\Http\Controllers\Controller;
use LaravelFrance\Http\Requests\ChangeEmalRequest;
use LaravelFrance\Http\Requests\ChangeUsernameRequest;
use LaravelFrance\User;

class ProfileController extends Controller
{
    public function index()
    {
        return redirect()->route('profile.change-username');
    }

    public function changeUsername()
    {
        return view('profile.change-username');
    }

    public function postChangeUsername(ChangeUsernameRequest $request)
    {
        /** @var User $user */
        $user = $request->user();

        $user->changeUsername($request->username);

        alert()->success("Votre pseudo est maintenant : {$request->username}", 'Félicitation !')->autoclose(3000);

        return back();
    }

    public function changeAvatar()
    {
        return view('profile.change-avatar');
    }

    public function postChangeAvatar(ChangeEmalRequest $request)
    {
        /** @var User $user */
        $user = $request->user();

        $user->changeEmail($request->email);

        alert()->success("Vous venez de changer d'avatar ! :)", 'Félicitation !')->autoclose(3000);

        return back();
    }
}