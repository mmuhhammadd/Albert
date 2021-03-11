@extends('layouts.app')

@section('content')
<div class="container-fluid vh-90 mt-4">
  <div class="row row-cols-1 row-cols-md-2 align-items-center">
    <div class="col mb-4 align-items-center">
      <div class="card text-center h-100 border-0 bg-transparent">
        <div class="card-body">
          <h1 class="card-title" style="font-size: 4em; color: #273c75;">New<br>Course</h1>
        </div>
      </div>
    </div>
    <div class="col mb-4 h-100">
      <div class="card h-100 border-0">
        <form class="needs-validation w-75 m-4 mx-auto" novalidate method="POST" action="{{ route('Courses.store') }}">
          @csrf
          <div class="form-row pb-2">
            <div class="form-group col-12">
              <label for="name">Name</label>
              <input type="text" required class="form-control rounded-0 py-3" name="name">
            </div>
          </div>
          <div class="form-row pb-2">
            <label for="content">Content</label>
            <textarea type="text" style="resize: none; overflow: auto;" required class="form-control rounded-0" name="content"></textarea>
          </div>
          <div class="form-row pb-2">
            <div class="col-6">
              <label for="duration">Duration</label>
              <input type="number" required class="form-control rounded-0 py-3" name="duration">
            </div>
            <div class="col-6">
              <label for="price">Price</label>
              <input type="number" required class="form-control rounded-0 py-3" name="price">
            </div>
          </div>
          <div class="form-row pb-4">
            <label for="subject">Subject</label>
            <select required class="custom-select rounded-0" name="subject">
              <option selected disabled value="">Choose</option>
              <option>Drawing</option>
              <option>Animation</option>
              <option>Business</option>
              <option>Design</option>
              <option>IT</option>
              <option>Management</option>
              <option>Marketing</option>
            </select>
          </div>
          <div class="form-row">
            <button type="submit" class="btn rounded-0 text-light" style="background: #273c75;">Create</button>
          </div>
        </form>
        </div>
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
@endsection