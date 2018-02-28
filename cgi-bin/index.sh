#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "home page"
cat <<END-OF-CAT
<h1>What is Blind Computing?</h1>
<p>This website is the hub of content for blind and visually impaired users that use a computer. We will cover as much as we can, from blind/vi devices, to the latest operating systems, down to accessible tools, programs and web sites that contributers have found useful.</p>
<p>  Blind computing was started out of the demise of braillenoteusers.info, a site that I used a lot and found very helpfull. It aims to reconstruct the library of braillenote content on that site, however, we plan to cover a much broader scope of topics that are not necessarily related to the braille note.</p>
<h2>how to contribute</h2>
<p>Please see the <a href="contributing.sh">contributing page</a> for more information.</p>
<h2>Note</h2>
<p>We reccommend you view this site in mozilla firefox, found at <a href="https://firefox.com/download">the firefox download page</a>, if you're on a computer. Other browsers might work, but in general, firefox is more accessible anyway.</p>
</section></body></html>
END-OF-CAT
