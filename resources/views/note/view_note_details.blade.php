@extends('layout')

@section('welcome-content')

<center><h1><u>VIEW NOTE</u></h1></center><br>
<br>

<div id="content" style="width:auto">
    {{-- <h1>{{ Storage::url($note->image) }}</h1> --}}
    <center>
        <img src="{{ asset(Storage::disk('local')->url($note->image)) }}" height="200px" >
    </center>

    {{-- <div>  {{Storage::disk('local')->url($note->image)}} </div> --}}
    <div class="title">
        <h2>Title : {{ $note->title }}</h2><hr>
    </div>
    <p>{{ $note->description }}</p>
</div>
@endsection