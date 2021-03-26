<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Http\Requests\SettingsRequest;
use App\User;
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
}
