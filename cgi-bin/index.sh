#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "home page"
cat <<END-OF-CAT
<h1>What is Blind Computing?</h1>
<p>Blind computing is made to be the hub of content for blind and visually impared users that need or want to use a computer. We will try to cover as much as we can, from blind/vi devices, to the latest computer operating systems, all the way down to accessible tools, programs and web sites that contributers have found useful.</p>
<p>  Blind computing was actually started out of the demise of braillenoteusers.info, which is a site that the creater of this web site used a lot and found very helpfull. It aims to reconstruct the library allready existing on that website, however, we plan to cover a much broader scope of topics that are not related to the braille note.</p>
<h2>how to contribute</h2>
<p>The best way is to submit a pull request to the <a href="https://github.com/mcb2003/blind-computing" target="_blank" title="opens in a new tab">github repository</a>. These files are automatically uploaded to the site every three hours, so after the pull request has been accepted, you should weight a while to see the changes. That is, unless I'm nice and decide to force a re-upload.</p>
<h2>Note</h2>
<p>We reccommend you view this site in firefox if you're on a desktop, as this is what it's been tested in. Other browsers might work, but in general, mozilla's offeriing is more accessible anyway.</p>
</div></body></html>
END-OF-CAT
