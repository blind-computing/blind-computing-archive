<!DOCTYPE html>
<html>
  <head>
    <?php
      $id = 22;
      include_once("../includes/headers.inc.php");
    ?>
  </head>
    
  <body>
    <?php
      include("../includes/nav.inc.php");
    ?>
    <main id="content">
      <?php
        require_once("../includes/functions.inc.php");
        echo create_article_info(2);
      ?>
      <article>
<p>  These days, we all need a web browser, mainly to visit blind-computing,! Ok, really though, the internet's world wide web is becoming one of the biggest things in all of our lives (it's up there with chocolate and watching netflicks). So, how do blind computer users access the internet?</p>
<p>  Of course, they could use one of the mainstream offerings for most tasks, such as <a href="https://www.google.com/chrome/" target="about:blank">google's chrome browser</a> or <a href="https://firefox.com/download" target="about:blank">mozilla's firefox</a>, but these have their accessible limmits. For example, I personally find it very fidgity to use google chrome due to its lack of high contrast support and overall hard to navigate interface with a screen reader (probably due to webkit). That's where webbie comes in.</p>
<h3>The Webbie Web Browser</h3>
<p>  The webbie web browser is a dot net application written in visual basic that uses the internet explorer frame work to render pages. It will strip out all images and graphical content, leaving the user with a list of items on the page. This layout is a cinch to use when you're scrolling down it with a screen reader (just press the up and down arrow keys), which makes it way easier than using chrome all ready. Clicking on a link does what you think it would do, and clicking on a form field will pop up a dialog box where that field can be filled out. Screen readers work extremely well with this way of navigation (it's just standard windows dialogs and fields).</p>
<p>  You can also switch the browser into the <strong>"web"</strong> mode, which renders the pages normally, graphics and all, which will still provide about the same level of accessibility, but let's you see what you're doing (if you have any usable sight).</p>
<p>  The browser also works well if you need high contrast theming or zoom, because as I stated earlier, the interface is made up of completely standard windows components. </p>
<h3>The Extras!</h3>
<p>  Along with the web browser, the webbie suite of applications comes with a number of useful tools including an accessible, text only PDF reader, a talking clock with reminders and alarms, a number of BBC I player programs for listening to radio - be it live or pre-recorded - or watch BBC TV and an accessible file management program. You can download all of the programs in one bundle from <a href="https://webbie.org.uk" target="about:blank">the webbie website</a>, as well as downloading the programs separately</p>
<h3>Conclusion</h3>
<p>  Overall, I love these programs. They're well designed, functional and useful. I particularly like the attention to detail, like the loading and finished loading sounds in the webbie web browser.</p>
<p>  You can download the programs from <a href="https://webbie.org.uk" target="about:blank">the webbie web site</a>. While you're there, checkout there blog - they've posted many articles on accessible software, such as <a href="https://www.webbie.org.uk/Veli-Pekka/ms_access_aids.html" target="about:blank">a review of the narrator screen reader and windows magnification tools</a>.</p>
<p>Thanks for reading</p>
<i>Mikey</i>
      </article>
      </main>
  </body>
</html>
