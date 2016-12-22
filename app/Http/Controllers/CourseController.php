<?php

namespace App\Http\Controllers;

use App\Course;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            $courses=Course::all();
            return view('admin.courses.index',compact('courses'));
        }
        else
        {
            $courses=$user->course()->get();
            return view('teacher.dashboard',compact('courses'));
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
              'description'=>'required',
              'introduction'=>'required',
              'requirement'=>'required',
              'audience'=>'required',
              'benefit'=>'required',
              'demo'=>'required',
              'title'=>'required|max:100',
              'image'=>'required',
            // 'slug'=>'required|max:250',
              'course_length'=>'required',
              'price' => 'digits_between:1,5'
         ]);

        //Basic info
        $length = $request->input('course_length');
       // $slug = $request->input('slug');
        $demo=$request->input('demo');;

        //course
        $course_uniqueId = uniqid();
        $image="";
        //image upload
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName=$course_uniqueId . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(900, 600)->save($location);
            $image=$fileName;
        }

        //general info
        $title = $request->input('title');
        $description = $request->input('description');
        $introduction = $request->input('introduction');
        $requirement = $request->input('requirement');
        $audience = $request->input('audience');
        $benefit = $request->input('benefit');
        $price = $request->input('price');

        $course = new Course(
            [
                'unique_id'=> $course_uniqueId,
                'title' => $title,
                'introduction'=>$introduction,
                'description' => $description,
                'requirement' => $requirement,
                'audience' => $audience,
                'benefit' => $benefit,
                'image'=>$image,
                'length'=>$length,
                'demo'=>$demo,
                'price'=>$price,
                'views'=>0,
            ]
        );

        if( $request->user()->course()->save($course))
        {
            Session::flash('message','Your course has been created');
            $course->tags()->attach($request->input('tag'));
            return redirect('/admin/course');
        }
        else
        {
            return redirect()->back();
        }

        //user
        /* $user_id = $request->input('user_id');

        //Basic info
        $categorie_id = $request->input('categorie_id'); // marque
        $price = $request->input('price');
        $contact_price= $request->input('contact_for_price');
        $physical_Problems = json_encode($request->input('physical_Problems'));
        $accessories = json_encode($request->input('accessories'));
        $condition = json_encode($request->input('condition'));

        //Address info
        $location_id = $request->input('location_id'); // city
        $address = $request->input('address');
        $phone = $request->input('phone');

        // address parameter
        $hide_number = $request->input('hide_number');
        $hide_email = $request->input('hide_email');
        $hide_address = $request->input('hide_address');

        //map info
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        //general info
        $title = $request->input('title');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $img1 = $request->input('img1');
        $img2 = $request->input('img2');
        $img3 = $request->input('img3');
        $video_url = $request->input('video_url');
        $total_view = 0;

        //subscription info
        $package_id = $request->input('package_id');
        $amount = "amount from package";

        //Post
        $post_uniqueId=uniqid();
        $search_meta='seo';
        $published = '0'; // if package free : 0 (activate by admin )
        //if package paid (1) to approve by admin and (2) pending not active yet. */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Course::findOrFail($id);
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
        $course = Course::find($id);
        if(Auth::user()->hasRightForCourse($course))
        {
            $this->validate($request,[
                'description'=>'required',
                'introduction'=>'required',
                'requirement'=>'required',
                'audience'=>'required',
                'benefit'=>'required',
                'demo'=>'required',
                'title'=>'required|max:100',
                //'slug'=>'required|max:250',
                'course_length'=>'required',
                'price' => 'digits_between:1,5'
            ]);

            //post
            $course->length = $request->input('course_length');
            $demo=$request->input('demo');
            //image upload
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $fileName=$course->unique_id . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $fileName);
                Image::make($image)->resize(900, 600)->save($location);
                $course->image=$fileName;
            }

            //general info
            $course->title = $request->input('title');
            $course->description = $request->input('description');
            $course->introduction = $request->input('introduction');
            $course->requirement = $request->input('requirement');
            $course->audience = $request->input('audience');
            $course->benefit = $request->input('benefit');
            $course->price = $request->input('price');
            $course->demo = $demo;

            $course->save();
            Session::flash('message','Your course has been updated');
            $course->tags()->sync($request->input('tag'));
            return redirect('/admin/course');
        }

        return redirect('/admin/course');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $user = Auth::user();

        if(!$user->hasRightForCourse($course->id))
        {
            return response("You dont have the right",404);
        }
        $course->delete();
        return redirect()->back();
    }

    public function create()
    {
        $tags= Tag::get();
        return view('admin.courses.create',compact('tags'));
    }

    public function edit(Course $course)
    {
        $tags=Tag::get();

        $selected_tags = json_encode($course->tags()->getRelatedIds());

        return view('admin.courses.edit',compact("course","tags","selected_tags"));
    }

}
