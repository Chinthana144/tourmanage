<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akagi eXperience</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div id="div_login">
        <div id="div_logo">
            <div>
                <img src="{{ asset('images/company/logo.png') }}" alt="" id="img_logo">
            </div>
            <div>
                <p id="p_title">Akagi eXperience</p>
            </div>
        </div>
        <div id="div_form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="div_input">
                    <label for="email" class="label_input">Email</label>
                    <input id="email" type="email" class="input_text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="div_input">
                    <label for="password" class="label_input">Password</label>
                    <input id="password" type="password" class="input_text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="div_input">
                    <input class="input_check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="label_check" for="remember">Remember Me</label>
                </div>
                <div class="div_input">
                    <button type="submit" id="btn_login">Login</button>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn_forgot" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </form>

        </div>
    </div>
</body>
</html>
