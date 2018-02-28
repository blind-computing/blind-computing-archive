#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Ubuntu Mate 16.04"
cat <<END-OF-CAT
<h2>ubuntu mate 16.04 accessibility</h2>
<p>  Ubuntu mate is quickly growing to be a well respected, clean, easy to use linux distrobution.It has the latest features, the coolest software and the best desktop interface (in my opinion), but does it have the accessibility features that blind/vi people need out of an operating system?</p>
<p>  Actually, the answer looks very promissing</p>
<p>here's a quick video showing the accessibility features of ubuntu mate 16.04 lts.</p>
END-OF-CAT
. ./includes/video.inc.sh "https://www.youtube.com/embed/yCfBoCzOoEE" "12 Oct 2016" "ubuntu-mate-16.04"
cat <<END-OF-CAT
</section></body></html>
END-OF-CAT
