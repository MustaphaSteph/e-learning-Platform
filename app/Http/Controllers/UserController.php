<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Course;
use App\Lecture;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use \Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['show_tag',
            'show_course','signin','signup','plans','singleBlog','blogs'
        ]]);
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            if(Auth::user()->role()->where('name','admin')->first())
            {
                return redirect('/admin') ;
            } else if (Auth::user()->role()->where('name','student')->first())
            {
                return redirect('/user/my-courses') ;
            } else if(Auth::user()->role()->where('name','teacher')->first())
            {
                return redirect('/admin/course') ;
            }
        }

        return redirect('/login')->withErrors([
        'email' => 'The credentials you entered did not match our records. Try again?',
    ]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'full_name'=>'required',
            'email'=>'required'
        ]);

        $user = Auth::user();

        $user->name=$request->input('username');
        $user->full_name=$request->input('full_name');
        $user->email=$request->input('email');
        $user->facebook=$request->input('facebook');
        $user->twitter=$request->input('twitter');
        $user->linkedin=$request->input('linkedin');

        if($request->hasFile('picture'))
        {
            $image=$request->file('picture');
            $fileName=uniqid(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(417, 324)->save($location);
            $user->picture=$fileName;
        }


        if($user->save())
        {
            Session::flash('message','You profile has been updated');
            return redirect()->back();
        }else{
            return redirect()->back()->with('errors','Try again!');
        }
    }

    public function show_course(Course $course)
    {
        $course->views = $course->views + 1;
        $course->save();
        $apply='non';

        if (Auth::check()) {

            $user = Auth::user();

            if($course->users->find($user->id))
            {
                $apply="yes";
            }
        }

        $rat = DB::table('course_user')
            ->select('course_id', DB::raw('SUM(rating) as sum_rating'),DB::raw('COUNT(rating) as total_rat'))
            ->where('course_id', $course->id)
            ->get();

        $total_rat = $rat[0]->total_rat;
        $sum_rat=$rat[0]->sum_rating;
        $rating = 0;
        if($total_rat!=0)
        {
            $rating = ($sum_rat/$total_rat)*20;
        }

        return view('course.single-course',compact('course','apply','rating','total_rat'));
    }

    public function show_tag(Tag $tag)
    {
        $courses = $tag->courses()->get();
        $tags = Tag::get();
        $courses_views = DB::table('courses')
            ->orderBy('views','desc')
            ->take(5)
            ->get();
        $articles = DB::table('blogs')
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        return view('course.course',compact('courses','tags','courses_views','articles'));
    }

    public function view_course(Course $course)
    {

        // associate course id with user
        $user = Auth::user();

        if ( $course->price <= 0)
        {
            if(!$course->users->find($user->id))
            {
                $course->users()->attach($user);
            }
            $demo=$course->demo;
            return view('admin.courses.section.lecture.show',compact('course','demo'));
        }
        else
        {
            if ($user->subscribed('main'))
            {
                if(!$course->users->find($user->id))
                {
                    $course->users()->attach($user);
                }
                $demo=$course->demo;
                return view('admin.courses.section.lecture.show',compact('course','demo'));
            }
            else
            {
                Session::flash('message','You need to subscribe first');
                return redirect('/user/plans');
            }
        }

    }

    public function myCourses()
    {
        $courses = Auth::user()->courses()->get();
        return view('user.courses',compact('courses'));
    }

    public function show_lecture(Course $course,Lecture $lecture)
    {
        return view('admin.courses.section.lecture.show',compact('course','lecture'));
    }

    public function stripe(Request $request)
    {
        $user = Auth::user();

        $user->newSubscription('main', $request->input('plan'))->create($request->input('token'));


        return response()->json(['response' => 'This is get method']);

    }

    public function plans()
    {
        return view('plans.plans');
    }

    public function payment($plan)
    {
        $user = Auth::user();

        if ($user->subscribed('main'))
        {
            Session::flash('message','You are already subscribed , Go to your profile and change it');
            return redirect('/user/plans');
        }
        else
        {
            return view('plans.stripe',compact('plan'));
        }
    }

    public function blogs() // show all blog posts in site
    {
        $posts = Blog::get();
        return view('site.blog.home',compact('posts'));
    }

    public function singleBlog(Blog $blog) // show a single blog post
    {
        $blog->views = $blog->views + 1;
        $blog->save();

        return view('site.blog.post',compact('blog'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function cancel_subscription()
    {
        $user = Auth::user();

        if($user->subscription('main')->cancel())
        {
            Session::flash('message','Your subscription has been canceled');
            return redirect()->back();
        }else{

            return redirect()->back()->with('error','Something is wrong... plz try again');
        }

    }

    public function upgrade_subscription()
    {
        $user = Auth::user();

        if ($user->subscribed('main')) // see if user is already subscribed
        {
            if(($user->subscribedToPlan('Starter', 'main'))) // now we see wish subscription he have and try to upgrade
            {
                if($user->subscription('main')->swap('Ninja'))
                {
                    Session::flash('message','Your subscription has been upgraded to Ninja 10$ / month');
                    return redirect()->back();
                }
                else{
                    return redirect()->back()->with('errors','something is wrong');
                }
            }
            else if (($user->subscribedToPlan('Ninja', 'main')))
            {
                if($user->subscription('main')->swap('Hero'))
                {
                    Session::flash('message','Your subscription has been upgraded to Hero 90$ / year');
                    return redirect()->back();
                }
                else{
                    return redirect()->back()->with('errors','something is wrong');
                }

            }else if (($user->subscribedToPlan('Hero', 'main')))
            {
                    return redirect()->back()->with('errors','We dont have more plans , you are in hero plan');

            }else
            {
                Session::flash('message','Plz chose a subscription');
                return redirect()->to('200','/user/plans') ;

            }

        }else
        {
            Session::flash('message','Plz chose a subscription');
            return redirect()->to('200','/user/plans') ;
        }

    }

    public function active_subscription()
    {
        $user = Auth::user();

        if ($user->subscription('main')->cancelled()) {

            if ($user->subscription('main')->resume())
            {
                Session::flash('message','Your subscription has been active now : Hero 90$ / year');
                return redirect()->back();
            }else{
                return redirect()->back()->with('errors',"we can't resume your subscription");

            }

        }
        else{
            return redirect()->back()->with('errors','You have problem, try again!');

        }
    }

}
