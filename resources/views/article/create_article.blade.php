@extends('layout')
<style>
    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    }

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }
</style>
@section('welcome-content')

<center><h1><u>CREATE ARTICLE</u></h1></center>
<div class="container">
    @if(session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{url('/save_article')}}" method="POST">
        @csrf
        <label>Title</label>
        @error('title')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <input type="text" id="title" name="title" placeholder="Title" class="@error('title') is-invalid @enderror"">

        <label>Short Description</label>
        @error('short_description')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <input type="text" id="short_description" class="@error('short_description') is-invalid @enderror" name="short_description" placeholder="Short Description">

        <label>Long Description</label>
        @error('long_description')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <textarea id="long_description" name="long_description" class="@error('long_description') is-invalid @enderror" placeholder="Long Description" style="height:200px"></textarea><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>
@endsection
