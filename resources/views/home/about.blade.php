@extends('layout')

@section('welcome-content')

<script>
	// calling the function to add active class
    $(document).ready(function() {

        $('li.active-class-about').addClass("current_page_item");
    });
</script>

<center><h1><u>ABOUT US</u></h1></center>

<div id="content" style="width:auto">
    <div class="title">
        <h2>Welcome to our website</h2>
        <span class="byline">Mauris vulputate dolor sit amet nibh</span>
    </div>
    <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
    <p>Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis.
        Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce
        odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem.
        Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy
        magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo. Aliquam lacinia metus ut elit.
        Suspendisse iaculis mauris nec lorem. Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus
        at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius non, nibh. 
    </p>
    <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget
        ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis.
        Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce
        odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem.
        Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy
        magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
    <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget
        ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis.
        Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce
        odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem.
        Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy
        magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
</div>
@endsection