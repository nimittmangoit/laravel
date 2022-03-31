<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{   
    // view tag

    public function view_tags() {

        $this->middleware('auth');
        
        // return view('tag.all_tags');
        $all_tags = Tag::orderBy('id','desc')->paginate(10);
        // print_r($all_tags);
        return view('tag.all_tags')->with('tags',$all_tags);
    }

    // save tag

    public function save_tag() {
        
        $this->middleware('auth');

        request()->validate([
            'tag'=>'required'
        ]);

        $tag = new Tag();
        $tag->tag = request('tag');
        $tag->save();

        return redirect()->back()->with('message', 'Created Successfully!');


    }

    // for delete note

    public function delete_tag($id)
    {
        $this->middleware('auth');

        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->back()->with('message', 'Deleted Successfully!');

    }

}
