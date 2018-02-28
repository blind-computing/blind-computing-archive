#!/bin/bash
echo "Content-type:text/html"
echo

. ./includes/nav.inc.sh "Accessible Operating Systems"
cat <<END-OF-CAT
<h2>Operating System Accessibility</h2>
<p>Whether it's a linux distribution, the latest mac operating system or the hot new stuff from microsoft, or even google, we intend to cover how accessible it is to blind and visually impaired users on this page to show you what choices you have when picking an OS as a blind computing community member.</p>
<p>Oh and once you've got an operating system you can use, you'll probably want some <a href="software.sh">accessible software to go with it</a>.</p>
END-OF-CAT
. ./includes/resources.inc.sh operating-systems
echo "</section></body></html>
"
