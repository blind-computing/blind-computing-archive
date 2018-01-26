echo "<iframe class=\"video-embed\" src=\"${1}\" frameborder=\"0\" allow=\"encrypted-media\" allowfullscreen>Loading...</iframe>"
cat <<END-OF-CAT
<div class="video-info">
<h3>youtube video description</h3>
END-OF-CAT
echo "<p>Published on ${2}</p>"
cat "includes/video-descriptions/${3}.html"
echo "</div>"
