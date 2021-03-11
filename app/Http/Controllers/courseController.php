<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\User;
use Illuminate\Http\Request;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function mycourses() {
        $user = User::find(auth()->user()->id);
        $courses = $user->courses;
        return view('courses.mycourses', compact('courses'));
    }

    public function enrolledcourses() {
        $user = User::find(auth()->user()->id);
        $courses = $user->mycourses;
        return view('courses.enrolledcourses', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'subject' => 'required'
        ]);
        $request['user_id'] = auth()->user()->id;
        Course::create($request->all());
        return redirect()->route('Courses.index');
    }

    public function enroll($id) {
        $student = auth()->user();
        $student->mycourses()->attach([$id]);
        return back();
    }

    public function category($category) {
        if ($category == 'All') {
            return redirect()->route('Courses.index');
        }
        else {
            $courses = Course::where('subject', '=', $category)->get();
            return view('courses.category', compact('courses', 'category'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = course::where('id', $id)->first();
        if (!$course) {
            return redirect()->route('Courses.index');
        }
        $user = User::where('id', $course->user_id)->first();
        return view('courses.show', compact('course','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('courses.edit', [
            'course' => Course::findOrFail($id)
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'subject' => 'required'
        ]);
        $request['user_id'] = auth()->user()->id;
        $course = Course::find($id);
        $course->update($request->all());
        $user = User::find(auth()->user()->id);
        $courses = $user->courses;
        return view('courses.mycourses', compact('courses'))->with('updated', 'hlkhkhl');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        $user = User::find(auth()->user()->id);
        $courses = $user->courses;
        return view('courses.mycourses', compact('courses'))->with('deleted', 'hlkhkhl');
    }
}
