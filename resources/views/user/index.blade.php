@extends('layouts/app')
@section('style')
    <style>
        body {
            background-color: #f5f6fa;
        }
        .nav-link {
            color: white !important;
        }
        a.active {
            background-color: #192a56 !important;
        }
        table {
          background-color: #192a56 !important;
        }
        button:focus {
          outline: none !important;
          border: none !important;
          box-shadow: none !important;
        }
    </style>
@endsection
@section('content')

<div class="container-fluid mt-5 d-flex align-items-center justify-content-center">
  <div class="row w-100 justify-content-center">
  <div class="col-md-8 bg-transparent card border-0 rounded-0 text-center">
    <div class="card-body">
      @if (isset($updated))
      <div class="alert alert-success rounded-0" id="message" role="alert">
        Profile updated successfully!
      </div>
      @endif
      <h1 class="card-title" style="font-size: 3.5em; color: #2f3640; font-weight: 700">{{ $user['name'] }}</h1>
      <div class="m-2 w-75 mx-auto d-flex flex-row justify-content-around">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-sm text-light rounded-0 px-4 py-2" style="background-color: #353b48;" data-toggle="modal" data-target="#exampleModal">Edit</button>
                        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content rounded-0 border-0">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body text-left">
                <form novalidate class="needs-validation" method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input required class="form-control rounded-0 py-2" name="name" type="text" value="{{ $user['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="name">E-Mail</label>
                        <input required class="form-control rounded-0 py-2" name="email" type="email" value="{{ $user['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Birth Date</label>
                        <input  required class="form-control rounded-0 py-2" name="birthdate" type="date" value="{{ $user['birthdate'] }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" hidden name="password" type="text" value="{{ $user['password'] }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" hidden name="gender" type="text" value="{{ $user['gender'] }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" hidden name="role" type="text" value="{{ $user['role'] }}">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                <button type="submit" class="btn rounded-0 text-light" style="background-color: #192a56;">Save changes</button>
                </form>
                </div>
              </div>
            </div>
            </div>
            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm text-light rounded-0 px-4 py-2" style="background-color: #2f3640;">Delete</button>
            </form>
          </div>
    </div>
    </div>
    <div class="table-responsive bg-transparent justify-content-center">
      <table class="table  table-striped bg-transparent table-borderless">
        <tbody>
          <tr>
            <td style="font-family: 'Noto Sans KR', sans-serif !important; font-weight: 700; color: #7f8fa6;">Email</td>
            <td style="font-weight: 600; color: #2f3640;">{{ $user['email'] }}</td>
          </tr>
          <tr>
            <td style="font-family: 'Noto Sans KR', sans-serif !important; font-weight: 700; color: #7f8fa6;">Password</td>
            <td><!-- Button trigger modal -->
              <button type="button" style="font-weight: 700; color: #9c88ff;" class="btn p-0" data-toggle="modal" data-target="#changepassword">
                Change password
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changepasswordlabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content rounded-0">
                    <div class="modal-header">
                      <h5 class="modal-title" id="changepasswordlabel">Update Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form novalidate class="needs-validation">
                        <div class="form-group">
                          <label for="oldpassword">Current Password</label>
                          <input required type="password" class="form-control rounded-0 py-2" id="oldpassword">
                        </div>
                        <div class="form-group">
                          <label for="password">New Password</label>
                          <input required type="password" class="form-control rounded-0 py-2" name="password" id="password">
                        </div>
                        <div class="form-group">
                          <label for="confirmpassword">Confirm Password</label>
                          <input required type="password" class="form-control rounded-0 py-2" id="confirmpassword">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                      <button class="btn btn-dark rounded-0" id="changebtn">Save changes</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div></td>
          </tr>
          <tr>
            <td style="font-family: 'Noto Sans KR', sans-serif !important; font-weight: 700; color: #7f8fa6;">Role</td>
            <td style="font-weight: 600; color: #2f3640;">{{ $user['role'] }}</td>
          </tr>
          <tr>
            <td style="font-family: 'Noto Sans KR', sans-serif !important; font-weight: 700; color: #7f8fa6;">Birth Date</td>
            <td style="font-weight: 600; color: #2f3640;">{{ $user['birthdate'] }}</td>
          </tr>
          <tr>
            <td style="font-family: 'Noto Sans KR', sans-serif !important; font-weight: 700; color: #7f8fa6;">Gender</td>
            <td style="font-weight: 600; color: #2f3640;">{{ $user['gender'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
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
    $('#changebtn').click(function(e) {
      e.preventDefault();
      var oldpassword = $('#oldpassword').val();
      var password = $('#password').val();
      var confirmpassword = $('#confirmpassword').val();
      $.ajax({
        url: "/updatepassword",
        type: "POST",
        data:{ 
            _token:'{{ csrf_token() }}',
            oldpassword: oldpassword,
            newpassword: password,
            confirmpassword: confirmpassword 
        },
        success:function(data) {
          if (data.data == 'success') {
                  $('.modal-body').prepend(`<div class="alert rounded-0 alert-success alert-dismissible fade show" role="alert">
              Password updated successfully!
              <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
          }
          else if(data.data == 'wrong') {
            $('.modal-body').prepend(`<div class="alert rounded-0 alert-warning alert-dismissible fade show" role="alert">
              Incorrect password!
              <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
          }
          else if(data.data == 'notmatch') {
            $('.modal-body').prepend(`<div class="alert rounded-0 alert-warning alert-dismissible fade show" role="alert">
              Passwords don't match!
              <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
          }
        },
        cache: false,
        dataType: 'json',
      })
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#message').delay(3000).hide(1000);
  });
</script>
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
@endsection