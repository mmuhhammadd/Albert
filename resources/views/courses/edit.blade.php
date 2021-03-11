@extends('layouts.app')
@section('content')
<div class="container-fluid vh-90 mt-4">
  <div class="row row-cols-1 row-cols-md-2 align-items-center">
    <div class="col mb-4 align-items-center">
      <div class="card text-center h-100 border-0 bg-transparent">
        <div class="card-body">
          <h1 class="card-title" style="font-size: 4em; color: #273c75;">Update<br>Course</h1>
        </div>
      </div>
    </div>
    <div class="col mb-4 h-100">
      <div class="card h-100 border-0">
        <form class="needs-validation w-75 m-4 mx-auto" novalidate method="POST" action="{{ route('Courses.update', $course->id) }}">
          @csrf
          @method('PUT')
          <div class="form-row pb-2">
            <div class="form-group col-12">
              <label for="name">Name</label>
              <input required type="text" class="form-control rounded-0 py-3" value="{{ $course['name'] }}" name="name">
            </div>
          </div>
          <div class="form-row pb-2">
            <label for="content">Content</label>
            <textarea required type="text" style="resize: none; overflow: auto;" class="form-control rounded-0" name="content">{{ $course['content'] }}</textarea>
          </div>
          <div class="form-row pb-2">
            <div class="col-6">
              <label for="duration">Duration</label>
              <input required type="number" class="form-control rounded-0 py-3" value="{{ $course['duration'] }}" name="duration">
            </div>
            <div class="col-6">
              <label for="price">Price</label>
              <input required type="number" class="form-control rounded-0 py-3" value="{{ $course['price'] }}" name="price">
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
            <button type="submit" class="btn rounded-0 text-light" style="background: #273c75;">Update</button>
          </div>
        </form>
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
