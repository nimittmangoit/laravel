@extends('layout')
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


<center><h1><u>ALL ARTICLES</u></h1></center><br><br>

@if(session()->has('message'))
    <br>
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
<table class="table">
    <tr>
        <th>Title</th>
        @auth
        <th>Update</th>
        <th>Delete</th>
        @endauth
    </tr>
    @foreach($article as $articles)
        <tr>
            <td>{{ $articles['title'] }}</td>
            @auth
                <td><button class="btn btn-default pull-right"><a href="update_article_view/{{ $articles['article_id'] }}">Update Article</a></button></td>
                <td>
                    <form action="{{url('/delete_article/'.$articles['article_id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger pull-right" type="submit" name="submit" value="Delete">
                    </form>
                </td>
            @endauth

        </tr>
    @endforeach
</table>

<tr class="pull-right">

    {{ $article->links() }}
</tr>

@endsection

