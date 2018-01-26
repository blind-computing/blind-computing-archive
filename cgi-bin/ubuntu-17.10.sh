#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Ubuntu 17.10"
cat <<END-OF-CAT
<h2>Ubuntu 17.10 accessibility</h2>
<p>It was the talk of the town when it came out! The new Canonical, releasing there latest version of ubuntu with ... the gnome desktop? Anyway, since this is a rather big change, we'll go over the accessibility features of this new release so that anyone upgrading to 17.10, or to 18.04 when it comes out, will have a smooth transition.</p>
END-OF-CAT
. ./includes/video.inc.sh "https://www.youtube.com/embed?v=mQTrnzkVkmk" "23 Oct 2017" "ubuntu-17.10"
cat <<END-OF-CAT
</div></body></html>
END-OF-CAT
