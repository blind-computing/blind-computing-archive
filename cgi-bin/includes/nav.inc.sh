\cat <<END-OF-CAT
<html>
<head>
<title>
END-OF-CAT
echo "Blind Computing | $*"
cat <<END-OF-CAT
</title>
<style type="text/css">
END-OF-CAT
cat css/style.css
cat <<END-OF-CAT
</style>
</head><body>
<div id="headerbar">
<a id="headerhome" href="index.sh" title="go to the home page"><h1>/</h1></a>
END-OF-CAT
echo "<h1 class=\"main-header\">Blind Computing | $*</h1>"
cat <<END-OF-CAT
</div>
<div id="sidebar">
<strong>Navigation</strong>
<a id="skiptocontent" href="#content" title="skips the focus to the main content of this page">Skip to Content</a>
<ul id="navigation">
END-OF-CAT
cat includes/nav-items.csv | while read line
do
name="$(echo $line | cut -d, -f1 -)"
comment="$(echo $line | cut -d, -f2 -)"
page="$(echo $line | cut -d, -f3 -)"
printline="<li class=\"nav-item\"><a href=\"${page}\" title=\"${comment}\">${name}</a></li>"
echo "$printline"
done
cat <<END-OF-CAT
</ul>
<hr style="width:15%;">
</div>
<div id="content">
END-OF-CAT