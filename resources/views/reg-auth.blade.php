@extends('layout')

@section('title', 'Регистрация/авторизация')

@section('page-content')
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a class="tab-link" href="#signup">Sign Up</a></li>
            <li class="tab"><a class="tab-link" href="#login">Log In</a></li>
        </ul>
        <div class="tab-content">
            <div id="signup">
                <h1 class="title">Sign Up for Free</h1>
                <form action="/" method="post">
                    <div class="field-wrap">
                        <label>
                            Nickname<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off"/>
                    </div>
                    <button type="submit" class="button-form button-block"/>Get Started</button>
                </form>
            </div>
            <div id="login">
                <h1 class="title">Welcome Back!</h1>
                <form action="/" method="post">
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email"required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password"required autocomplete="off"/>
                    </div>
                    <p class="forgot"><a class="tab-link" href="#">Forgot Password?</a></p>
                    <button class="button-form button-block"/>Log In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
