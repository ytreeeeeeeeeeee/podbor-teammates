<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
        $user->avatar = 'public/storage/avatars/base_avatar.jpeg';
        $user->country = $userData['country'];

        $user->save();

        return redirect(route('reg-auth') . '?tab=login');
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

    public function editProfile($id, Request $request) {
        $newData = $request->except('_token');

        $validator = Validator::make($newData, [
            'name' => 'required',
            'description' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect(route('profile', ['id' => $id]))
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);

        foreach ($newData as $key => $value) {
            if ($key === 'avatar' && $value) {
                if (Storage::exists($user->{$key}) && $user->{$key} !== 'public/storage/avatars/base_avatar.jpeg') {
                    unlink(storage_path('app/public/avatars/' . basename($user->{$key})));
                    Storage::delete($user->{$key});
                }

                $image = Image::make($newData['avatar'])->fit(400, 400);
                $path = 'avatars/' . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16) . '.jpg';

                $image->save(storage_path('app/public/' . $path));

                $user->{$key} = 'public/storage/' . $path;
                continue;
            }
            else if ($key === 'avatar' && !$value) {
                continue;
            }

            if ($user->{$key} !== $value) {

                $user->{$key} = $value;
            }
        }

        if ($user->isDirty()) {
            $user->save();
        }

        return redirect(route('profile', ['id' => $id]));
    }
}
