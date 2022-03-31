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
<center><h1><u>ALL USERS</u></h1></center><br><br>
@if(session()->has('message'))
    <br>
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Joined On</th>
        <th>Delete</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <form action="{{url('/admin/delete_user/'.$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input onclick="return confirm('Are you sure you want to delete this user ?')" class="btn btn-danger pull-right" type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<tr class="pull-right">
    {{ $users->links() }}
</tr>

@endsection

