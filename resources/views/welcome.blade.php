@extends('layout')
<style>
    .chip {
        display: inline-block;
        padding: 0 25px;
        /* height: 50px; */
        font-size: 16px;
        margin: 2px;
        border-radius: 25px;
        background-color: #f1f1f1;
    }
</style>
@section('header-background')
@endsection

@section('welcome-content')
<div id="sidebar">
    <h2>Notes</h2><hr>
    <ul class="style1">

        @foreach($note as $notes)
        <li class="first">
            <h3><a href="view_note/{{ $notes['id'] }}">{{ $notes['title'] }}</a></h3>
            @foreach ($notes->tags->pluck('tag','id') as $item)
            <a href="view_tag_notes/{{ $item }}" class="chip"> {{ $item }}</a>
            @endforeach
            <p>{{ $notes['description'] }}</p>
        </li>
    @endforeach
        
    </ul>
    <div id="stwo-col">
        <div class="sbox1">
            <h2>Etiam rhoncus</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Amet ornare hendrerit lectus</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
            </ul>
        </div>
        <div class="sbox2">
            <h2>Integer gravida</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Consequat lorem phasellus</a></li>
                <li><a href="#">Amet turpis feugiat amet</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('welcome-content-side')



<div class="row">

    <div class="col-lg-6">

        
    </div>
    <div class="col-lg-6">

        <div id="sidebar">
            <h2>Articles</h2><hr>

            <ul class="style1">
        
                @foreach($article as $articles)
                    <li class="first">
                        <h3><a href="view_article/{{ $articles['article_id'] }}">{{ $articles['title'] }}</a></h3>
                        <p>{{ $articles['short_description'] }}</p>
                    </li>
                @endforeach
                
            </ul>
            <div id="stwo-col">
                <div class="sbox1">
                    <h2>Etiam rhoncus</h2>
                    <ul class="style2">
                        <li><a href="#">Semper quis egetmi dolore</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                        <li><a href="#">Amet ornare hendrerit lectus</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                    </ul>
                </div>
                <div class="sbox2">
                    <h2>Integer gravida</h2>
                    <ul class="style2">
                        <li><a href="#">Semper quis egetmi dolore</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                        <li><a href="#">Consequat lorem phasellus</a></li>
                        <li><a href="#">Amet turpis feugiat amet</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
