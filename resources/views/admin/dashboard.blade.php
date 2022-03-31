@extends('admin_layout')

@section('header-background')
@endsection

@section('welcome-content')
<div id="content">
    <div class="card" style="border: solid 1px black;">
        <div class="card-body" style="padding:10px">
            <span class="card-title" style="font-size:20px">All Notes : </span><a href="{{ url('/admin/all_notes') }}" class="btn btn-primary">View All Notes</a>&nbsp;<a href="{{ url('/admin/view_create_note_page') }}" class="btn btn-primary">Add Note</a>
        </div>
    </div><br>
    <div class="card" style="border: solid 1px black;">
        <div class="card-body" style="padding:10px">
            <span class="card-title" style="font-size:20px">All Tags : </span><a href="{{ url('/admin/view_tags') }}" class="btn btn-primary">View All Tags</a>
        </div>
    </div><br>
    <div class="card" style="border: solid 1px black;">
        <div class="card-body" style="padding:10px">
            <span class="card-title" style="font-size:20px">All Users : </span><a href="{{ url('/admin/view_users') }}" class="btn btn-primary">View All Users</a>
        </div>
    </div>
</div>
@endsection

@section('welcome-content-side')
<div id="sidebar">

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
