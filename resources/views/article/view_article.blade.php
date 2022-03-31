@extends('layout')

@section('welcome-content')

<center><h1><u>VIEW ARTICLE</u></h1></center><br>

<button class="btn btn-primary pull-right"><a href="../update_article_view/{{ $article['article_id'] }}">Update Article</a></button>

<div id="content" style="width:auto">
    <div class="title">
        <h2>Title : {{$article['title']}}</h2><br>
        <span class="byline">{{$article['short_description']}}</span>
    </div>
    <p>{{$article['long_description']}}</p>
</div>
@endsection