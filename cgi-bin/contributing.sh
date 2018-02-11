#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Contributing"
cat <<END-OF-CAT
<h2>How to Contribute to Blind Computing</h1>
<h3 id="byemail">By Email</h3>
<p>If you would like to send any articles, videos or other information my way to be included into the website, you can <a href="mailto:michaelabuchan3370+blindcomputing@gmail.com">Email Me using this link</a>. This is the best option if you don't know how to use git and github, or for smaller pieces of information that need to be written up into articles or made into videos.</p>
<h3>Using Github</h3>
<p>Github is a great place to store code and the entire blind computing web site is up there. If you know what you're doing with git and github, you can <a href="https://github.com/mcb2003/blind-computing" target="about:blank">use this link to get to the github page</a>. If not, I suggest sending any content <a href="#byemail">through email</a>.</p>
<strong>Thanks for all the support!</strong>
</div></body></html>
END-OF-CAT
