@extends('admin_layout')
<style>
    input[type=text],
    select,
    textarea {
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

<center>
    <h1><u>CREATE NOTES</u></h1>
</center>

<div class="container">

    @if(Session::has('message'))
        <br>
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <form action="{{url('/save_note')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title</label>
        @error('title')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <input type="text" id="title" value="{{ old('title') }}" name="title" class="@error('title') is-invalid @enderror" placeholder="Title">

        <label>Select Tags</label>
        @error('tags')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <select id="tags" name="tags[]" class="@error('tags') is-invalid @enderror"  multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag['id'] }}" {{ (collect(old("tags"))->contains($tag['id'])  ? "selected":"") }}>{{ $tag['tag'] }}</option>
            @endforeach
        </select><br><br>

        <label>Upload Image</label>
           <input type="file" name="image" id="image">
        <br>
        <label>Description</label>
        @error('description')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <textarea id="description" class="@error('description') is-invalid @enderror" name="description"
            placeholder="Description" style="height:110px" >{{ old('description') }}</textarea>

        <br><br><input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
</div>
@endsection
