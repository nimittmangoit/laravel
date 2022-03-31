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

<center><h1><u>UPDATE NOTE</u></h1></center>

<div class="container">
    @if(session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{url('/update_note')}}" method="POST">
        @csrf
        @method('PUT')
        <label>Title</label>
        @error('title')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror" placeholder="Title" value="{{$note['title']}}">

        <input type="hidden" name="id" id="id" value="{{$note['id']}}">
        
        <label>Select Tags</label>
        @error('tags')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <select id="tags" name="tags[]" class="@error('tags') is-invalid @enderror" multiple>
            @foreach($all_tags as $tag)
                {{-- @foreach ($note->tags->pluck('tag') as $item )
                    @if ($tag['tag'] == $item)
                        <option value="{{$tag['tag']}}" selected="selected">{{$tag['tag']}}</option>
                    @else
                        <option value="{{$tag['tag']}}">{{$tag['tag']}}</option>
                    @endif
                @endforeach --}}
                <option value="{{$tag['id']}}">{{$tag['tag']}}</option>

            @endforeach
        </select><br><br>
        
        <label>Description</label>
        @error('description')
            <span class="invalid-feedback text-danger" role="alert">
                <strong> ( {{ $message }} )</strong>
            </span><br>
        @enderror
        <textarea id="description" class="@error('description') is-invalid @enderror" name="description" placeholder="Description" style="height:110px" >{{$note['description']}}</textarea><br><br>   

        <input type="submit" name="update" value="Update">
    </form>
</div>
@endsection
