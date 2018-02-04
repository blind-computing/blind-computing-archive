#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "downloads"
cat <<END-OF-CAT
<h2>Downloads</h2>
<p>This page lists some interesting downloads, whether created by any one of our contributers or external (created by someone else entirely and just software that we all love).</p>
END-OF-CAT
. ./includes/resources.inc.sh downloads
echo "</div></body></html>
"
