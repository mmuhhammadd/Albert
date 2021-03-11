@extends('layouts.app')
@section('style')
    <style>
      a {
        text-decoration: none;
      }
      a:hover {
        text-decoration: none;
      }
      .card { transition: all .2s ease-in-out; }
      .card:hover {
         transform: scale(1.05); 
         background-color: #192a56;
         }
    </style>
@endsection
@section('content')
@if (count($courses) == 0)
<div class="jumbotron mt-5 jumbotron-fluid bg-transparent text-center">
  <div class="container">
    <h1 class="display-4">NOTHING HERE!</h1>
    <p class="lead">You haven't added any courses yet!<a href="{{ route('Courses.create') }}" style="color: #9c88ff; text-decoration: none;"> Add course.</a></p>
  </div>
</div>
@else
<div class="container-fluid">
  <div class="row row-cols-1 mt-4 row-cols-md-1">
    <div class="col-12 mx-auto">
      @if (isset($deleted))
      <div class="alert alert-success rounded-0" id="message" role="alert">
        Course deleted successfully!
      </div>
      @endif
      @if (isset($updated))
      <div class="alert alert-success rounded-0" id="message" role="alert">
        Course updated successfully!
      </div>
      @endif
      <nav class="navbar navbar-light bg-light">
        <span class="navbar-text" style="color: #192a56">
          <strong>Courses you have created</strong>
        </span>
      </nav>
    </div>
  </div>
  <div class="row row-cols-1 mt-4 row-cols-md-3">
    @foreach ($courses as $course)
    <a href="{{ route('Courses.show', $course->id) }}">
    <div class="col mb-4">
      <div class="card text-light rounded-0 border-0" style="background-color: #273c75;">
        <div class="card-body">
          <h5 class="card-title">{{ $course['name'] }}</h5>
          <p class="card-text" style="font-weight: 500; color: #9c88ff;">{{ $course['subject'] }}</p>
          <p class="card-text" style="font-weight: 100;"><i>{{ $course['content'] }}</i></p>
        </div>
      </div>
    </div>
    </a>
    @endforeach
  </div>
</div>
@endif
<script>
  $(document).ready(function() {
    $('#message').delay(3000).hide(1000);
  });
</script>
@endsection