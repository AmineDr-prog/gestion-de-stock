<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    <div class="form-cont">
        <div class="form">
            <div>
                <div>
                <div class="card">
                    <div class="form-header">{{ __('Log in') }}</div>

                    <div class="form-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <div class="input">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Adresse" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            <div>
                                <br>
                                <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif <br>
                                <a class="btn btn-link" href="/register">
                                    {{ __('Creer un compte') }}
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

