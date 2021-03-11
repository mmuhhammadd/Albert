@extends('layouts.app')
@section('content')
  <div class="card border-0 w-90 mx-2 my-4">
    <div class="card-body p-4 text-light" style="background-color: #273c75;">
      <div class="row justify-content-between mb-3">
        <h1 class="col-6 card-title">{{ $course->name }}</h1>
        @if (auth()->user()->role == 'Student')
        @if ($course->students->contains(auth()->user()->id))
        <div>
        <button class=" btn rounded-pill mr-4 text-light" style="background-color: #192a56; font-weight: 600" disabled>Enrolled</button>
        </div>
        @else
        <div>
        <a href="{{ route('Courses.enroll', $course->id) }}"><button class="btn rounded-pill mr-4 text-light" style="background-color: #192a56; font-weight: 600">Enroll</button></a>
        </div>
        @endif
        @else
        @if (auth()->user()->id == $course->user_id)
        <div class="d-flex flex-row justify-content-start">
          <div>
              <a href="{{ route('Courses.edit', $course->id) }}" style="background-color: #192a56; font-weight: 600;" class="btn px-4 rounded-pill text-light m-2">Edit</a>
          </div>
          <div>
            <form method="POST" action="{{ route('Courses.destroy', $course->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn rounded-pill m-2 text-light px-3" style="background-color: #192a56; font-weight: 600;">Delete</button>
            </form>
         </div>
      </div>
      @endif
      @endif
      </div>
      <p class="card-text" style="color: #9c88ff; font-weight: 500">{{ $course['subject'] }}</p>
      <p class="card-text" style="font-weight: 200;"><i>{{ $course['content'] }}</i></p>
      <table class="table p-0 m-0 table-borderless w-50 text-light">
        <tbody>
          <tr>
            <td><strong>Lecturer</strong></td>
            <td style="font-weight: 100;">
              @if(auth()->user()->id == $course->user_id)
              <i>You</i>
              @else
              <i>{{ $user['name'] }}</i>
              @endif
            </td>  
          </tr>
          <tr>
            <td><strong>Duration</strong></td>
            <td style="font-weight: 100;" ><i>{{ abs($course['duration']) }} HRS</i></td>
          </tr>
          <tr>
            <td><strong>Cost</strong></td>
            <td style="font-weight: 100;"><i>{{ abs($course['price']) }} EGP</i></td>
          </tr>
        </thead>
      </table>
    </div>
    @if ($course->students->contains(auth()->user()->id))
    <div class="card-footer bg-transparent p-0 py-3">
        <form method="POST" action="{{ route('reviews.store') }}">
          @csrf
            <div class="form-row">
                <div class="col-9">
                  <input class="form-control rounded-0" name="review" type="text" placeholder="Add Review">
                  <input class="form-control" name="course_id" type="text" value="{{ $course->id }}" hidden>
                </div>
                <div class="col-3">
                    <button type="submit" style="background-color: #273c75" class="btn text-light form-control text-truncate rounded-0">Add Review</button>
                </div>
            </div>
        </form>
    </div>
    @endif
    <div class="card-footer my-1 p-0 text-light border-0" style="background-color: #192a56;">
        <h3 class="p-4">REVIEWS</h3>
    </div>
        @foreach ($course->reviews as $review)
        <div class="card mb-1 text-light rounded-0 border-0" style="background-color: #273c75;">
          <div class="card-body">
            <h5 class="card-title">{{ $review->user->name }}</h5>
            <p class="card-text mt-3" style="font-weight: 200">{{ ucwords($review->review) }}</p>
          </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection