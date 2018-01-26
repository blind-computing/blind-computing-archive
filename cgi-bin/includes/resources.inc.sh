cat <<END-OF-CAT
<h3>List of Resources</h3>
<ul class="resource-list">
END-OF-CAT
cat includes/${1}-items.csv | while read line
do
prefix="$(echo $line | cut -d, -f1 -)"
lnktxt="$(echo $line | cut -d, -f2 -)"
page="$(echo $line | cut -d, -f3 -)"
printline="<li class=\"resource\">${prefix} <a href=\"${page}\">${lnktxt}</a>.</li>"
echo "$printline"
done
cat <<END-OF-CAT
</ul>
</div>
END-OF-CAT
