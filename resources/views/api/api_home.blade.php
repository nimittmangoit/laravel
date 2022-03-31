@extends('layout')
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    
                    <h2>
                        API DASHBOARD
                    </h2>
                        {{-- <br><br> --}}
                    {{-- <a href="view_create_note_page" class="btn btn-primary">Create Note</a>
                    <a href="create_article" class="btn btn-primary">Create Article</a>
                    <a href="view_tags" class="btn btn-primary">View Tags</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<br><hr>
<h4>
    All Employee List 
</h4><br><br>
<table class="table">
    <tr>
        <th>Title</th>
        <th>Name</th>
        <th>Salary</th>
        <th>Age</th>

    </tr>
    @foreach($employee_list->data as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->employee_name }}</td>
            <td>{{ $employee->employee_salary }}</td>
            <td>{{ $employee->employee_age }}</td>
          
        </tr>
    @endforeach
</table>

<tr class="pull-right">
    {{-- {{ $$employee_list->data->links() }} --}}
</tr>
@endsection
