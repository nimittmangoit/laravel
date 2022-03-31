@extends('layout')

@section('header-background')
@endsection

@section('welcome-content-side')
<div id="">
    <h2>Tags : {{ $notes['tag'] }}</h2>
    <ul class="style1">
        @foreach($notes['notes'] as $note)
            <li class="first">
                <h3><a>{{ $note['title'] }}</a></h3>
                <p>{{ $note['description'] }}</p>
            </li>
        @endforeach
        
    </ul>
</div>
@endsection
