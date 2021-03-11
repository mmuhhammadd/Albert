@extends('layouts.app')
@section('style')
    <style>
      a {
        text-decoration: none;
      }
      a:hover {
        text-decoration: none;
      }
         .dropdown-item {
           transition: ease-in-out;
         }
         .dropdown-item {
           border: none !important;
           outline: none !important;
      }
      
    </style>
@endsection
@section('content')

<div class="container-fluid">
<div class="row row-cols-1 mt-4 row-cols-md-1">
  <div class="col-12 mx-auto">
    <nav class="navbar p-0 navbar-light bg-light">
      <div class="dropdown w-100">
        <button class="btn bg-transparent py-2 rounded-0 text-left w-100 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Browse All Courses
        </button>
        <div class="dropdown-menu rounded-0 w-100" aria-labelledby="dropdownMenu2">
          <input class="dropdown-item py-2" value="All" type="button">
          <a href="{{ route('category', 'Drawing') }}"><input class="dropdown-item py-2" value="Drawing" type="button"></a>
          <a href="{{ route('category', 'Animation') }}"><input class="dropdown-item py-2" value="Animation" type="button"></a>
          <a href="{{ route('category', 'Business') }}"><input class="dropdown-item py-2" value="Business" type="button"></a>
          <a href="{{ route('category', 'Design') }}"><input class="dropdown-item py-2" value="Design" type="button"></a>
          <a href="{{ route('category', 'IT') }}"><input class="dropdown-item py-2" value="IT" type="button"></a>
          <a href="{{ route('category', 'Management') }}"><input class="dropdown-item py-2" value="Management" type="button"></a>
          <a href="{{ route('category', 'Marketing') }}"><input class="dropdown-item py-2" value="Marketing" type="button"></a>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="card-columns py-3">
  @foreach ($courses as $course)
  <a href="{{ route('Courses.show', $course->id) }}">
  <div class="card py-0 border-0 rounded-0">
    <div class="card text-light rounded-0 border-0" style="background-color: #273c75;">
      <div class="card-body">
        <h5 class="card-title">{{ $course['name'] }}</h5>
        <p class="card-text subject" style="font-weight: 500; color: #9c88ff;">{{ $course['subject'] }}</p>
        <p class="card-text" style="font-weight: 100;"><i>{{ $course['content'] }}</i></p>
      </div>
    </div>
  </div>
  </a>
  @endforeach
</div>
</div>
@endsection