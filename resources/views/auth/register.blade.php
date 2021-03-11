<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
            input::placeholder {
                color: white !important;
            }
            input {
                color: white !important;
            }
            select {
                color: white !important;
                background-color: #192a56 !important;
                border-color: white !important;
            }
            ::-webkit-calendar-picker-indicator {
                filter: invert(1);
            }
        </style>
    </head>
    <body>
        <div class="container-fluid vw-100 vh-100">
            <div class="row justify-content-start h-100">
                <div class="col-lg-4 bg-transparent h-100 my-auto d-flex bg-light flex-column justify-content-center align-items-center">
                    <div class="mb-4"><a href="{{ route('welcome') }}"><span style="color: #192a56; background-color: white;" class="py-2 px-3 rounded-pill"><i class="fas fa-lg fa-arrow-left"></i></span></a></div>
                    <form class="w-75 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="mb-4 text-light">SIGN UP</h2>
                    <div class="form-group w-100">
                        <input id="name" type="text" class="form-control bg-transparent py-3 rounded-0 @error('name') is-invalid @enderror w-100" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <i>{{ $message }}</i>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group w-100">
                        <input id="email" type="email" class="form-control bg-transparent rounded-0 py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group w-100">
                        <input id="password" type="password" class="form-control bg-transparent rounded-0 py-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <i>{{ $message }}</i>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group w-100">
                        <input id="password-confirm" type="password" class="form-control bg-transparent rounded-0 py-2" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group w-100">
                        <select class="custom-select  rounded-0 py-2" name="gender">
                            <option selected disabled value="">Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <input name="birthdate" type="date" class="form-control bg-transparent rounded-0 py-2" placeholder="Birth Date">
                    </div>
                    <div class="form-group w-100">
                        <select class="custom-select rounded-0 py-2" name="role">
                            <option selected disabled value="">Role</option>
                            <option>Lecturer</option>
                            <option>Student</option>
                          </select>
                    </div>
                    <div class="form-group w-100 text-center">
                        <button class="btn rounded-pill px-4 py-2 border-light text-light" style="background-color: #192a56;" type="submit">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        {{-- <script>
            $('input').each(function() {
                $(this).focus(function() {
                    $(this).animate({
                        padding: '30px'
                    }, 500)
                })
                $(this).blur(function() {
                    $(this).animate({
                        padding: '10px'
                    }, 500)
                })
            })

        </script> --}}
    </body>
</html>
