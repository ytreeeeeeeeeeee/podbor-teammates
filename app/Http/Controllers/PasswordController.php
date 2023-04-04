<?php

namespace App\Http\Controllers;

use App\Events\PasswordResetRequested;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function forgetPasswordPage() {
        return view('forget-password');
    }

    public function forgetPassword(Request $request) {
        $newData = $request->except('_token');

        $validator = Validator::make($newData, [
            'email' => 'required|email:rfc,dns,filter|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect(route('forget-password-page'))
                ->withErrors($validator)
                ->withInput();
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        event(new PasswordResetRequested($request->email, $token));

        return back()->with('message', 'Письмо отправлено на почту!');
    }

    public function resetPasswordPage(Request $request, $token) {
        return view('reset-password', ['email' => $request->email, 'token' => $token]);
    }

    public function resetPassword(Request $request) {
        $isRequestValid = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$isRequestValid){
            return back()->withErrors(['message' => 'Данные некорректны']);
        }

        if ($request->password !== $request->password_confirm) {
            return back()->withErrors(['password' => 'Убедитесь, что вы ввели одинаковые значения в оба поля']);
        }

        User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect(route('reg-auth') . "?tab=login")->with('message', 'Пароль обновлен!');
    }
}
