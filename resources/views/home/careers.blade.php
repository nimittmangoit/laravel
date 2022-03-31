@extends('layout')

@section('welcome-content-side')

<script>
	// calling the function to add active class
    $(document).ready(function() {

        $('li.active-class-careers').addClass("current_page_item");
    });
</script>

<center><h1><u>CAREERS</u></h1></center>

<div id="sidebar" style="float:left;width:auto">
    <div id="stwo-col">
        <div class="sbox1">
            <h2>Etiam rhoncus</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Amet ornare hendrerit lectus</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
            </ul>
        </div>
        <div class="sbox2">
            <h2>Integer gravida</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Consequat lorem phasellus</a></li>
                <li><a href="#">Amet turpis feugiat amet</a></li>
            </ul>
        </div>
        <div class="sbox2">
            <h2>Integer gravida</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Consequat lorem phasellus</a></li>
                <li><a href="#">Amet turpis feugiat amet</a></li>
            </ul>
        </div>
        <div class="sbox2">
            <h2>Integer gravida</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Consequat lorem phasellus</a></li>
                <li><a href="#">Amet turpis feugiat amet</a></li>
            </ul>
        </div>
        <div class="sbox2">
            <h2>Integer gravida</h2>
            <ul class="style2">
                <li><a href="#">Semper quis egetmi dolore</a></li>
                <li><a href="#">Quam turpis feugiat dolor</a></li>
                <li><a href="#">Consequat lorem phasellus</a></li>
                <li><a href="#">Amet turpis feugiat amet</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection