<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup(Request $request) {
        $userData = $request->all();

        $validator = Validator::make($userData, [
            'email' => 'required|unique:users|email:rfc,dns,filter',
            'name' => 'required',
            'password' => 'required',
            'description' => 'required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('reg-auth') . '?tab=signup')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->description = $userData['description'];
        $user->avatar = '/images/base_avatar.jpeg';
        $user->country = $userData['country'];

        $user->save();

        return redirect(route('main-page'));
    }

    public function login(Request $request) {
        $userInfo = $request->only('email', 'password');

        $validator = Validator::make($userInfo, [
            'email' => 'required|email:rfc,dns,filter',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('reg-auth') . '?tab=login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($userInfo)) {
            return redirect(route('main-page'));
        }

        return redirect(route('reg-auth') . '?tab=login')
            ->withErrors(['auth_error' => 'Email или пароль введены некорректно'])
            ->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect(route('main-page'));
    }
}
