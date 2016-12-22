<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lecture;
use App\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LectureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Section $section)
    {
        $lectures = $section->lecture()->get();
        return view('admin.courses.section.lecture.index',compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Section $section)
    {
        $id_course=$section->course_id;
        $section_id=$section->id;
        $user = Auth::User();

        if($user->hasRightForCourse($id_course)) // test if the course belongs to the user
        {
            return view('admin.courses.section.lecture.create',compact('section_id'));
        }
        else
        {
            return response("you don't have the right to add lectures to this course",404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'length'=>'required',
            'description'=>'required',
            'link'=>'required',
            'section_id'=>'required'
        ]);

        $title=$request->input('title');
        $length=$request->input('length');
        $description=$request->input('description');
        $link=$request->input('link');
        $section_id=$request->input('section_id');

        $lecture = new Lecture([
            'title'=>$title,
            'description'=>$description,
            'link'=>$link,
            'length'=>$length,
        ]);

        $lecture->section()->associate($section_id);
        $lecture->save();

        return redirect('/admin/course/section/'.$section_id.'/show_lectures');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*public function show(Course $course,Lecture $lecture)
    {
        return view('admin.courses.section.lecture.show',compact('course','lecture'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('admin.courses.section.lecture.edit',compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'length'=>'required',
            'description'=>'required',
            'link'=>'required',
        ]);

        $user = Auth::user();
        $lecture = Lecture::find($id);

        if(!$user->hasRightForCourse($lecture->section->course_id))
        {
            return response("You dont have the right",404);
        }
        $title=$request->input('title');
        $length=$request->input('length');
        $description=$request->input('description');
        $link=$request->input('link');

        $lecture->title = $title;
        $lecture->length=$length;
        $lecture->description=$description;
        $lecture->link=$link;
        $lecture->save();
        Session::flash('message','Your lecture has been updated');
        $lectures = $lecture->section->lecture()->get();
        return view('admin.courses.section.lecture.index',compact('lectures'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {

        $user = Auth::user();

        if(!$user->hasRightForCourse($lecture->section->course_id))
        {
            return response("You dont have the right",404);
        }

        $lecture->delete();
        return redirect()->back();
    }
}
