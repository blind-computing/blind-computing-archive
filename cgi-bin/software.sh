#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Accessible Software"
cat <<END-OF-CAT
<h2>Software Accessibility</h2>
<p>It's all well and good having an operating system you can use, but what good is that if you don't have any software programs to use ontop of it? That's what this page is for. We plan to cover as many software packages as we can, ranging from web browsers to screen readers on every imaginable operating system.</p>
END-OF-CAT
. ./includes/resources.inc.sh software
echo "</section></body></html>
"
