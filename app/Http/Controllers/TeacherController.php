<?php

namespace App\Http\Controllers;

use App\Course;

use App\Http\Requests;

class TeacherController extends Controller
{


    public function index()
    {
        $user = Auth::user();

        $courses=$user->course()->get();

        return view('admin.courses.index',compact('courses'));
    }

    public function users( Course $course)
    {
        $users = $course->users()->get();

        return view('teacher.users',compact('users'));
    }
}
