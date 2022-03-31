<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoteCreateMail;
use App\Note;
use App\Tag;
use Auth;
use Session;

class NoteController extends Controller
{
    // for viewwing all notes

    public function all_notes() {
        
        $all_notes = Note::where('is_approved','1')->orderBy('id','desc')->paginate(10);
        // return view('note.all_notes',['notes'=>$all_notes]);
        return view('note.all_notes')->with('notes',$all_notes);
    }

    // return view create note page

    public function view_create_note_page() {
        
        $all_tags = Tag::orderBy('id','desc')->get();
        // print_r($all_tags);
        return view('note.create_note')->with('tags',$all_tags);
    }

    // save note code

    public function save_note(Request $request) {
        
        $this->middleware('auth');
        
        request()->validate([
            'title'=>'required',
            'tags'=>'required',
            'description' => 'required|min:20',
            'image' => 'required'
        ]);
        
        $rules = [
            'title'=>'required',
            'tags'=>'required',
            'image'=>'required',
            'description' => 'required|min:20'
        ];
    
        $customMessages = [
            'title.required' => 'The :attribute field is mandatory for posting note.',
            'tags.required' => 'Selection of tags in mandatory for note',
            'image.required' => 'Image is required for note',
            'description.required' => 'The :attribute field is mandatory for posting note.'
        ];
    
        $this->validate($request, $rules, $customMessages); 

        // save note first

        if ($request->hasFile('image')) {
            
           $image = $request->image->store('public/image');
        // $image_name = date('mdYHis') . uniqid().$image;
        }

        $note = new Note();
        $note->user_id = Auth::id();
        $note->title = request('title');
        $note->description = request('description');
        $note->image = $image;
        $note->save();

        // save tag mapping in pivot table

        $tagArray = request('tags');

        foreach($tagArray AS $tags ){
            // print_r($tags);
            
            $note = Note::find($note->id);
            $tag = Tag::find($tags);
            $note->tags()->attach($tag);
        }

        Mail::to(Auth::user()->email)
            ->send(new NoteCreateMail(Auth::user()->name));

        // Mail::raw('It mailing testing',function($message){
        //     $message->to(Auth::user()->email)
        //         ->subject('Hello there hi ai amoinfcboiewrbgor');
        // });

        Session::flash('message', 'Created Successfully!'); 
        return redirect()->back();

    }

    // get ntoe for update

    public function update_note_view($id) {

        $this->middleware('auth');
        
        $update_note_view = Note::findOrFail($id);
        $all_tags = Tag::get();
        return view('note.update_note',['note'=>$update_note_view, 'all_tags'=>$all_tags]);

    }

    // update specific article

    public function update_note(Request $request) {
        
        $this->middleware('auth');

        // print_r(request()->all());die;

        request()->validate([
            'title'=>'required',
            'description' => 'required|min:20',
            'tags' =>'required'
        ]);
        
        // save tag mapping in pivot table
        $id = request('id');

        $tagArray = request('tags');
        $note = Note::find($id);
        $note->tags()->sync($tagArray);

        $update_note = Note::where('id',$id)->update($request->except(['_token','update','_method','tags']));
        return redirect()->back()->with('message', 'Updated Successfully!');

    }

    // for delete note

    public function delete_note($id)
    {
        $this->middleware('auth');

        $note = Note::find($id);
        $note->delete();

        return redirect()->back()->with('message', 'Deleted Successfully!');

    }

    // view notes from tag

    public function view_tag_notes($tag) {
        
        $tag = Tag::where('tag',$tag)->first();
        $tag_id = $tag->id;

        $get_tag_notes = Tag::find($tag_id);
        $get_tag_notes->notes;
        return view('note.view_tag_notes')->with('notes',$get_tag_notes);
    }

    // view note in admin mode

    public function view_note($id) {
        
        // dd($id);
        $view_note = Note::where('id',$id)->firstOrFail();
        return view('note.view_note_details',['note'=>$view_note]);

    }
}
