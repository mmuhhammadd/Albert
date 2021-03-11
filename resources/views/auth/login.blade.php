<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <title>Albert</title>
        <style>
             * {
                font-family: 'Montserrat', sans-serif !important;
            }
            body {
                background-image: url('/img/sign.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            a:hover {
                text-decoration: none !important;
            }
            input {
                color: white !important;
            }
            input::placeholder {
                color: white !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid vw-100 vh-100">
            <div class="row justify-content-start h-100">
                <div class="col-lg-4 bg-transparent h-75 my-auto d-flex bg-light flex-column justify-content-around align-items-center">
                    <a href="{{ route('welcome') }}"><span style="color: #192a56; background-color: white;" class="py-2 px-3 rounded-pill"><i class="fas fa-lg fa-arrow-left"></i></span></a>
                    <form class="w-75 h-50 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="mb-4 text-light">SIGN IN</h2>
                    <div class="form-group w-100">
                        <input class="form-control bg-transparent py-4 rounded-0 @error('email') is-invalid @enderror w-100" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group w-100">
                        <input type="password" class="form-control bg-transparent rounded-0 py-4 border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group custom-control w-100 custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label text-light align-bottom" for="customCheck1">Remember Me</label>
                    </div>
                    <div class="form-group w-100 text-center">
                        <button class="btn rounded-pill px-4 py-2 border-light text-light" style="background-color: #192a56;" type="submit">Login</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" style="color: white" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>