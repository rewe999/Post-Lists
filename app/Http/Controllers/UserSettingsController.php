<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Http\Requests\SettingsRequest;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserSettingsController extends Controller
{
    public function settings(){
        $user = Auth::user();
        return view('auth.settings',['user' => $user]);
    }

    public function password(SettingsRequest $request){
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        if(Hash::check($oldPassword,$user->password) && ($newPassword == $confirmPassword)){
            $user->password = Hash::make($newPassword);
            $user->save();
            Session::put('passwordChanges','Udało się zmienić hasło');
        }

        return redirect('settings');
    }

    public function editName(NameRequest $request){
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $name = $request->input('name');
        $user->name = $name;
        $user->save();

        return redirect('settings');
    }

    public function show()
    {
        $user = User::with('userData')->find(Auth::id())->userData;
        return view('auth.userData',['user' => $user ]);
    }

    public function edit(Request $request)
    {
        $userData = User::with('userData')->find(Auth::id())->userData;
        $desc = $request->input('desc');

        if ($request->hasFile('avatar')){
            $path = $request['avatar']->store('UserProfileAvatar','public');
            $userData->avatar = $path;
        }

        $userData->description = $desc;
        $userData->user_id = Auth::user()->id;
        $userData->save();

        return redirect('settings');
    }
}
