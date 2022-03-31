@extends('admin_layout')
<!-- Latest compiled and minified CSS -->

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    
</style>
@section('welcome-content-side')
<center><h1><u>ALL TAGS</u></h1></center><br><br>
@if(session()->has('message'))
    <br>
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<form action="{{url('/save_tag')}}" method="POST">
    @csrf
    
    <label>Tag Name</label>
    @error('tag')
        <span class="invalid-feedback text-danger" role="alert">
            <strong> ( {{ $message }} )</strong>
        </span><br>
    @enderror
    <input type="text" id="tag" name="tag" class="@error('tag') is-invalid @enderror" placeholder="Tag Name">
    
    <br><br><input type="submit" class="btn btn-primary" name="submit" value="Add Tag">
</form>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Tag</th>
        <th>Delete</th>
    </tr>
    @foreach($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->tag }}</td>
            <td>
                <form action="{{url('/delete_tag/'.$tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger pull-right" type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<tr class="pull-right">
    {{ $tags->links() }}
</tr>

@endsection

