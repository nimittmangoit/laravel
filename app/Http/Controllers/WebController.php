<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class WebController extends Controller
{
    public function articles() {
        
        //return client view
        $article = Article::orderBy('article_id','desc')->paginate(10);
        return view('home.articles',['article'=>$article]);
    }

    public function about() {
        
        //return about view
        return view('home.about');
    }

    public function careers() {
        
        //return careers view
        return view('home.careers');
    }

    public function contact() {
        
        //return contact view
        return view('home.contact');
    }
}
