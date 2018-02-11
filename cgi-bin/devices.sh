#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "devices"
cat <<END-OF-CAT
<h2>Devices</h2>
<p>  This page is dedicated to topics relating to various braille note takers and other devices that are useful to blind or visually impaired people. Any contributions are welcome: these things are so expensive!</p>
END-OF-CAT
. ./includes/resources.inc.sh devices
echo "</div></body></html>
"
