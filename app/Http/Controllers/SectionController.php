<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
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
    public function index(Course $course)
    {
        $sections = $course->section()->get();
        return view('admin.courses.section.index',compact('sections'));
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
            'section_length'=>'required',
            'course_id'=>'required'
        ]);

        $title=$request->input('title');
        $section_length=$request->input('section_length');
        $course_id=$request->input('course_id');
        $user=Auth::User();

        if(!$user->hasRightForCourse($course_id))
        {
            return response("You dont have the right",404);
        }

        $section = new Section([
           'title'=>$title,
           'length'=>$section_length,
        ]);

        $section->course()->associate($course_id);
        $section->save();

        return redirect('/admin/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.courses.section.edit',compact('section'));
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
        $section = Section::find($id);

        $this->validate($request,[
            'title'=>'required',
            'section_length'=>'required',
        ]);

        $section->title=$request->input('title');
        $section->length=$request->input('section_length');
        $user=Auth::User();

        if(!$user->hasRightForCourse($section->course_id))
        {
            return response("You dont have the right",404);
        }

        $section->save();
        Session::flash('message','Your section has been updated');
        return redirect('/admin/course/'.$section->course_id.'/show_sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {

        $user = Auth::user();

        if(!$user->hasRightForCourse($section->course_id))
        {
            return response("You dont have the right",404);
        }

        $section->delete();

        return redirect()->back();
    }

    public function create(Course $course)
    {
        $user = Auth::User();
        $course_id=$course->id;

        if($user->hasRightForCourse($course_id)) // test if the course belongs to the user
        {
            return view('admin.courses.section.create',compact('course_id'));
        }
        else
        {
            return response("you don't have the right to add section to this course",404);
        }

    }

}
