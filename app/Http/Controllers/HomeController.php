<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('site.home');
    }

    public function plans()
    {
        return view('plans.stripe');
    }

    public function courses()
    {
        $courses =Course::All();
        $tags=Tag::get();
        $courses_views = DB::table('courses')
            ->orderBy('views','desc')
            ->take(5)
            ->get();
        $articles = DB::table('blogs')
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();
        // dd($courses->first()->section()->first()->lecture()->first());
        return view('course.course',compact('courses','tags','courses_views','articles'));
    }
    public function test()
    {
        $user = DB::table('course_user')
            ->select('course_id', DB::raw('SUM(rating) as sum_rating'),DB::raw('COUNT(rating_id) as total_rat'))
            ->groupBy('course_id')
            ->orderBy('total_user','desc')
            ->get();
        dd(json_encode($user));
    }
    public function testt(Request $request)
    {
        dd($request->input('comment-rating'));
    }

}
