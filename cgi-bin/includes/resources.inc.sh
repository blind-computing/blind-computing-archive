cat <<END-OF-CAT
<h3>List of Resources</h3>
<ul class="resource-list">
END-OF-CAT
filename="includes/${1}-items.csv"
cat $filename | while read line
do
    if [ -r $filename ]
    then
        credit="$(echo $line | cut -d, -f1 -)"
        prefix="$(echo $line | cut -d, -f2 - | sed 's/~/,/g')"
        lnktxt="$(echo $line | cut -d, -f3 -	| sed 's/~/,/g')"
        page="$(echo $line | cut -d, -f4 -)"
        printline="<li class=\"resource\">${prefix} <a href=\"${page}\" title=\"Credit: ${credit}\">${lnktxt}</a>.</li>"
        echo "$printline"
    else
        echo '<strong><p>No resources yet, check back later or <a href="https://github.com/mcb2003/blind-computing">submit a pull request to get your content here</a>.</p></strong>'
    fi
done
cat <<END-OF-CAT
</ul>
</div>
END-OF-CAT
