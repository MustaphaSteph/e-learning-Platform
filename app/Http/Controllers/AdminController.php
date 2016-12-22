<?php

namespace App\Http\Controllers;

use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        $courses = Course::all()->count();
        $users = User::all()->count();

        $last_users = DB::table('users')
        ->orderBy('created_at','desc')
            ->take(5)
        ->get();

        $last_courses = DB::table('courses')
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        return view('admin.index',compact('users','courses','last_users','last_courses'));

    }

    public function usersList()
    {
        $users = User::all();

            return view('admin.users.usersList',compact('users'));
    }

    public function update_role(Request $request , User $user)
    {
        $role = Role::get()->where('name',$request->input('role'))->first();

        if($role->user()->save($user))
        {
            Session::flash('message','you changed the role of user : '.$user->name);
            return redirect()->back();
        }
        else{

            return redirect()->back()->with('error','try again!');
        }


    }
}
