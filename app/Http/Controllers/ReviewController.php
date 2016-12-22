<?php

namespace App\Http\Controllers;

use App\Course;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = $request->input('course_id');

        $user = Auth::user();

        if($user->courses->find($course))
        {

            $this->validate($request,[
                'comment-rating'=>'required',
                'comment'=>'required',
            ]);


                $rating=$request->input('comment-rating');
                $content=$request->input('comment');
                $courses = Course::find($course);
                $courses->users()->detach($user->id);

            if(!$courses->users()->attach($user->id,['rating'=>$rating,'comment'=>$content]))
            {
                return redirect()->back();
            }else
            {
                return redirect()->back()->withErrors([
                    'error' => 'Something wrong happened',
                ]);
            }
        }
        else
        {
            return redirect()->back()->withErrors([
                'error' => "Sorry! You can't review the course until you watch it",
            ]);
        }

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
