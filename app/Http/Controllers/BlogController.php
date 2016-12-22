<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use \Illuminate\Support\Facades\Session;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::get();
        return view('admin.blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'content'=>'required',
            'image'=>'required',
            'time'=>'required',
        ]);

        $post_uniqueId = uniqid();
        $title = $request->input('title');
        $content= $request->input('content');
        $time= $request->input('time');
        $image='';

        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName=$post_uniqueId . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(900, 600)->save($location);
            $image=$fileName;
        }

        $blog = new Blog([
                'unique_id'=>$post_uniqueId,
                'title'=>$title,
                'time_to_read'=>$time,
                'picture'=>$image,
                'content'=>$content,
                'views'=>0,
        ]);

        if($request->user()->blog()->save($blog))
        {
            $posts = Blog::get();

            Session::flash('message','Your blog post has been saved');
            return view('admin.blog.index',compact('posts'));

        }else
        {
            return redirect()->back()->with('error','something is wrong');
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
