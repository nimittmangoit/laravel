<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoteApproveMail;
use App\Note;
use App\Tag;
use App\User;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // for admin home view

    public function index()
    {
        return view('admin.dashboard');
    }

    // for display all notes 

    public function all_notes()
    {
        $all_notes = Note::orderBy('id','desc')->paginate(10);
        return view('admin.all_notes')->with('notes',$all_notes);
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
        //
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

    // edit note view page

    public function edit_note_view($id)
    {
        $edit_note_view = Note::findOrFail($id);
        $all_tags = Tag::get();
        return view('admin.update_note',['note'=>$edit_note_view, 'all_tags'=>$all_tags]);
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
    // for delete note

    public function delete_note($id)
    {
        $note = Note::find($id);
        $note->delete();

        Session::flash('message', 'Note Deleted'); 
        return redirect()->back();

    }

    // update note route

    public function approve_note(Request $request) {
        
        $id = request('id');

        $approve_note = Note::where('id',$id)->update(['is_approved' => 1]);
        
        // for sending mail to user

        $note = Note::find($id);
        $note_user_email = $note->user->email;
        $note_user_name = $note->user->name;

        Mail::to($note->user->email)
        ->send(new NoteApproveMail($note->user->name));
        
        Session::flash('message', 'Note Approved'); 
        return redirect()->back();

    }

    // view notes from tag

    public function view_tag_notes($tag) {
        
        $tag = Tag::where('tag',$tag)->first();
        $tag_id = $tag->id;

        $get_tag_notes = Tag::find($tag_id);
        $get_tag_notes->notes;
        return view('admin.view_tag_notes')->with('notes',$get_tag_notes);
    }


    // for view all tags

    public function view_tags() {

        $all_tags = Tag::orderBy('id','desc')->paginate(10);
        return view('admin.all_tags')->with('tags',$all_tags);
    }

    // for view all users

    public function view_users() {

        $view_users = User::orderBy('id','desc')->paginate(10);
        return view('admin.view_users')->with('users',$view_users);
    }

    // delete user 

    public function delete_user($id)
    {
        $delete_user = User::find($id);
        $delete_user->delete();

        Session::flash('message', 'User Deleted'); 
        return redirect()->back();

    }


    // view create note page

    public function view_create_note_page() {
        
        $all_tags = Tag::orderBy('id','desc')->get();
        return view('admin.create_note')->with('tags',$all_tags);
    }

    // view note in admin mode

    public function view_note($id) {
        
        // dd($id);
        $view_note = Note::where('id',$id)->firstOrFail();
        return view('admin.view_note',['note'=>$view_note]);

    }
}
