@extends('admin_layout')

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
@section('welcome-content-side')
<center><h1><u>ALL NOTES</u></h1></center><br><br>

@if(Session::has('message'))
    <br>
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table">
    <tr>
        <th>Title</th>
        {{-- <th>Description</th> --}}
        <th>User</th>
        <th>Tags</th>
        <th>View</th>
        <th>Is Approved</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    @foreach($notes as $note)
        <tr>
            <td>{{ $note->title }}</td>
            {{-- <td>{{ $note->description }}</td> --}}
            <td>{{ $note->user->name }}</td>
            <td>
                @foreach ($note->tags->pluck('tag','id') as $item)
                    <a href="view_tag_notes/{{ $item }}" class="chip"> {{ $item }}</a>
                @endforeach
            </td>
            <td><button class="btn btn-primary pull-right"><a style="color:white" href="view_note/{{ $note->id }}">View Note</a></button></td>

            @if ($note->is_approved == '0')
                
                <td><button class="btn btn-primary pull-right"><a style="color:white" href="approve_note/{{ $note->id }}">Approve</a></button></td>
            
            @else
                
                <td><button class="btn btn-default pull-right" disabled><a>Approved</a></button></td>
                
            @endif

            <td><button class="btn btn-default pull-right"><a href="edit_note_view/{{ $note->id }}">Update Note</a></button></td>
            <td>
                <form action="{{url('/admin/delete_note/'.$note->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger pull-right" type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<tr class="pull-right">
    {{ $notes->links() }}
</tr>

@endsection

