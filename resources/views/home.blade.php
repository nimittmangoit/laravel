@extends('layout')

@section('welcome-content-side')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h2>
                        Welcome ,  {{ Auth::user()->name }}
                    </h2>

                    <br><br>
                    <a href="view_create_note_page" class="btn btn-primary">Create Note</a>
                    <a href="create_article" class="btn btn-primary">Create Article</a>
                    <a href="view_tags" class="btn btn-primary">View Tags</a>
                    {{-- <a href="create_article" class="btn btn-primary">Create Article</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
