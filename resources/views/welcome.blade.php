<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <title>Albert</title>
        <style>
            * {
                font-family: 'Montserrat', sans-serif !important;
            }
            .home {
                background-image: url('/img/backgroundimage.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .navbar-brand {
                font-size: 4.2em !important;
                font-weight: 600;
            }
            .navbar-nav li a {
                font-size: 1.3em;
            }
            .home .display-4 {
                font-weight: 400;
            }
            .card i {
              color: #192a56 !important;
            }
            .about {
              background-color: #dcdde1 !important;
            }
            .contact .right {
                background-image: url('/img/contact.png');
                background-size: contain;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .contact input {
              border-bottom: 1px solid #718093 !important;
              animation: border 1s infinite;

            }
            .contact textarea {
              border-bottom: 1px solid #718093 !important;
              animation: border 1s infinite;
              resize: none;
            }
            input, textarea {
              background-color: transparent !important;
            }
            .contact button {
              background-color: #192a56;
            }
            .contact input:focus {
              outline: 0;
              border: 0;
              animation-play-state: running;
            }
            .contact textarea:focus {
              outline: 0;
              border: 0;
              animation-play-state: running;
            }
            @keyframes border {
              from {
                border: 1px;
              }
              to {
                border: 5px;
              }
            }

        </style>
    </head>
    <body>
        <div class="home min-vh-100" id="home">
          @if (isset($message))
              <div class="alert w-100 mx-auto alert-success rounded-0" id="message" style="position: absolute" role="alert">
                Thank you for your feedback!
              </div>
              @endif
            <nav class="navbar bg-transparent py-5 navbar-expand-lg navbar-dark">
                <a class="navbar-brand pl-5" href="">Albert</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav w-100 pr-5 justify-content-end">
                    <li class="nav-item active">
                      <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                      </li>
                  </ul>
                </div>
              </nav>
              <div class="jumbotron jumbotron-fluid text-center w-75 mx-auto bg-transparent text-light">
                <div class="container">
                  <h1 class="display-4">Welcome to Albert</h1>
                  <p class="lead">The only biggest reason for doing so fast is that the world of the internet today people have started spending a lot of time on the internet. This has made them aware of online courses so that people take interest in it and take admissions.</p>
                </div>
              </div>
        </div>
        <div class="about min-vh-100" id="about">
            <div class="jumbotron jumbotron-fluid bg-transparent text-center text-dark ">
                <div class="container">
                  <h1 class="display-4">About</h1>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card bg-transparent text-center border-0 rounded-sm">
                            <span style="color: #273c75;"><i class="fas fa-2x fa-laptop-code mx-auto"></i></span>
                            <div class="card-body">
                              <h5 class="card-title">Online Courses</h5>
                              <p class="card-text">An online course is a course that is focused on the use of information and communication skills for learning. Or we can say in a simple language anyone can now learn whatever from anybody at any time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card bg-transparent text-center border-0 rounded-sm">
                            <span style="color: #273c75;"><i class="fas fa-2x fa-chalkboard-teacher mx-auto"></i></span>
                            <div class="card-body">
                              <h5 class="card-title">Expert Teachers</h5>
                              <p class="card-text">An online course is a course that is focused on the use of information and communication skills for learning. Or we can say in a simple language anyone can now learn whatever from anybody at any time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card bg-transparent text-center border-0 rounded-sm">
                            <span style="color: #273c75;"><i class="fas fa-2x fa-users mx-auto"></i></span>
                            <div class="card-body">
                              <h5 class="card-title">Community</h5>
                              <p class="card-text">An online course is a course that is focused on the use of information and communication skills for learning. Or we can say in a simple language anyone can now learn whatever from anybody at any time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact min-vh-100" id="contact">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-7 right d-flex flex-column justify-content-end">
              </div>
              <div class="col-md-5 bg-white left vh-100 d-flex flex-column align-items-center justify-content-center">
                <h2 class="mb-4">CONTACT US</h2>
                <form novalidate class="needs-validation w-75 h-50 d-flex flex-column justify-content-between" action="{{ route('contact.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input required class="form-control rounded-0 w-100 pb-3 border-0" name="name" type="text" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <input required class="form-control rounded-0 w-100 pb-3 border-0" name="mobile" type="text" placeholder="Mobile">
                  </div>
                  <div class="form-group">
                    <input required class="form-control rounded-0 w-100 pb-3 border-0" name="email" type="text" placeholder="E-Mail">
                  </div>
                  <div class="form-group">
                    <input required class="form-control rounded-0 w-100 pb-3 border-0" name="company" type="text" placeholder="Company">
                  </div>
                  <div class="form-group">
                    <textarea required class="form-control rounded-0 w-100 pb-3 border-0" name="body" placeholder="Your Message"></textarea>
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn px-4 py-2 rounded-pill text-light">Contact</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
          (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
        </script>
        <script>
          $(document).ready(function() {
            $('#message').delay(3000).hide(1000);
          });
        </script>
  </body>
</html>
