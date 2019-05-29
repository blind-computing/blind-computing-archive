@extends('layouts.app')

@section('title', 'Home')
@section('content')
<h1>Welcome!</h1>
<div class="row">
    <div class="col-sm-6">
        <h2>What is Blind Computing?</h2>
        <p>This website is the hub of content for blind and visually impaired users that use a computer. We will cover
            as much
            as we can, from blind/vi devices, to the latest operating systems, down to accessible tools, programs and
            web sites
            that contributors have found useful.</p>
        <p> Blind computing was started out of the demise of braillenoteusers.info, a site that I used a lot and found
            very
            helpfull. It aims to reconstruct the library of braillenote content on that site, however, we plan to cover
            a much
            broader scope of topics that are not necessarily related to the braille note.</p>

        <h2>how to contribute</h2>
        <p>Please see the <a href="/contributing">contributing page</a> for more information.</p>

        <h2>Note on Browser Support</h2>
        <p>If you're on Linux or Windows, we recommend you view this site in mozilla firefox, found at <a
                href="https://firefox.com/download">the firefox download page</a>. Other browsers might work, but in
            general,
            firefox is more accessible anyway.</p>
        <p> On a mac or iOS device, the built-in Safari browser seems to work fine as well. Chrome appears to be the
            second
            choice.</p>
    </div>
    <div class="col-sm-6">
        <iframe style="width: 100%; height: 50vh;" src="https://www.youtube.com/embed/tH9dlnxqtcU" frameborder="0"
            allow="encrypted-media" allowfullscreen="yes">Loading...</iframe>

        <h2>Latest News</h2>
        <p>Stay up to date with the latest news from Blind Computing by <a target="blank"
                href="http://blind-computing.blogspot.com">Visiting the blog</a>, <a target="blank"
                href="https://www.twitter.com/blind_comp">Following us on twitter</a> or <a target="blank"
                href="https://www.facebook.com/groups/347355422340125/">Joining our facebook group</a>.</p>
    </div>
</div>
@endsection
