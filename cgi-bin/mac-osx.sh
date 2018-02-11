#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Mac OS"
cat <<END-OF-CAT
<h2>Mac OS accessibility</h2>
<p>Lots of blind and visually impaired people allready know that apple has been doing amazing accessibility ever since 2004 when mac os 10.4 tiger was released and the feature set has continued to grow over the years. But for those who aren't up to date, or who are looking to buy a mac but not sure if they can justify the extortionate price tag, this video will show you the main features of the mac that I use for accessibility and why I prefer the mac's screenreader over any other.</p>
END-OF-CAT
. ./includes/video.inc.sh "https://www.youtube.com/embed/rYpm0LxRJfo" "28 May 2017" "mac-os10.12"
cat <<END-OF-CAT
</div></body></html>
END-OF-CAT
