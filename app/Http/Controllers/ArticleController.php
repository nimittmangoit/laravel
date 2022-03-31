<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Note;


class ArticleController extends Controller
{
    // return create article page
    public function create_article() {
        
        return view('article.create_article');
    }

    // code for save article from form
    public function save_article() {
        
        // print_r(request()->all());die;
        $this->middleware('auth');
        
        request()->validate([
            'title'=>'required',
            'short_description' => 'required|min:10',
            'long_description' => 'required|min:20'
        ]);
        
        $article = new Article();
        $article->title = request('title');
        $article->short_description = request('short_description');
        $article->long_description = request('long_description');
        $article->save();

        // return redirect('/create_article');
        return redirect()->back()->with('message', 'Created Successfully!');


    }
    
    // get latest 3 articles for homepage

    public function welcome_page_articles() {
        
        $article = Article::orderBy('article_id','desc')->take(3)->get();
        $note = Note::orderBy('id','desc')->take(3)->get();
        // dd($article);
        return view('welcome',['article'=>$article,'note'=>$note]);

    }

    // view article from welcome page

    public function view_article($article_id) {
        
        $view_article = Article::where('article_id',$article_id)->firstOrFail();
        return view('article.view_article',['article'=>$view_article]);

    }

    // get article for update

    public function update_article_view($article_id) {
        
        $this->middleware('auth');

        $update_article_view = Article::where('article_id',$article_id)->firstOrFail();
        return view('article.update_article',['article'=>$update_article_view]);

    }

    // update specific article

    public function update_article(Request $request) {
        
        $this->middleware('auth');

        request()->validate([
            'title'=>'required',
            'short_description' => 'required|min:10',
            'long_description' => 'required|min:20'
        ]);
        
        $article_id = request('article_id');
        $update_article = Article::where('article_id',$article_id)->update($request->except(['_token','update','_method']));
        // return redirect('/update_article_view/'.$article_id);
        return redirect()->back()->with('message', 'Updated Successfully!');

    }

    // for delete article

    public function delete_article($article_id)
    {
        $article = Article::where('article_id',$article_id);
        $article->delete();

        return redirect()->back()->with('message', 'Deleted Successfully!');

    }
}
