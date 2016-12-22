<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{


    public function index()
    {
        $tags= Tag::get();

        return view('admin.tags.index',compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $tag = new Tag([
           'name'=>$request->input('name'),
        ]);

        if($tag->save())
        {
            Session::flash('message','Your tag -'.$request->input('name').'- has been created');
        }
        return redirect('/admin/tags');
    }

    public function create()
    {
            return view('admin.tags.create');
    }


    public function update(Request $request , $id)
    {
        $this->validate($request,[
            'tag-name'=>'required'
        ]);

        $tag = Tag::find($id);
        $tag->name=$request->input('tag-name');

        if($tag->save())
        {
            Session::flash('message','Your tag has been updated');
        }

        return redirect()->back();
    }

    public function destroy( $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back();
    }


}
