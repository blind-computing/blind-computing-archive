<!DOCTYPE html>
<html>
  <head>
    <?php
      $id = 21;
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
        echo create_article_info(1);
      ?>
      <article>
<p>  So if you're new round here, you're probably asking, at almost every page you visit, "What in the actual world is linux?" Well, to explain what linux is, you need to know what an operating system is.</p>
<h3>Operating Systems</h3>
<p>  An operating system is essentially a piece of software, a program, that runs and manages the computer. In its simplest form, it displays stuff on the screen, allows you to smash that board of keys in front of you and is responsible for all those blue screens of death we all saw in the 90s. But seriously, an OS handles almost any task that you use a computer for in some way. Often programs can be loaded onto an operating system (they can be installed) to extend its functionality.</p>
<p>There are many thousands of operating systems out there, the most common of which are microsoft's windows OS that has the largest marketshare and apple's mac OS, which comes on any apple computer you buy. Linux is one of these and I believe it's the future. Why? You may ask ...</p>
<h3>The Concept of Opensource</h3>
<p>  While typical operating systems that you can think of are made in house at some company, the linux OS is open to the public. So what does this mean? Essentially, anybody with the knowledge can <strong>contribute</strong> to a project and the community as a whole can form around it, with each person scratching their particular itch and improving the OS as a whole. So in many less words, open source means that the code (<strong>source</strong>) is out in the <strong>open</strong> for anyone to contribute to.</p>
<h3>Distributions</h3>
<p>So, now you know what linux is. But what is ubuntu then? Or debian, arch, linux mint? These are called distributions (distros). They're essentially different versions of linux. Since the code is out in the open, anyone is free to create their own version of linux with their own tools and way of doing things. Consequently, distros can be <strong>based</strong> off of other distros, so ubuntu for example is based off of the code created by debian. All of this comes together to create a very flexible structure (you choose the distro that best suits your needs, or if you're feeling adventurous, you create your own).</p>
<h3>The downsides</h3>
<p>  Yes. As much as I don't want them to exist, this open model has its flaws. For example, if anyone can look at the code, anyone can find a security flaw. And while security researchers are constantly doing this to fix these holes, some people aren't like that and will take advantage of this opertunity. I believe with enough community support that this can be overcome (in fact it allready has), but it's a matter of opinion at this point.</p>
<p>  And that's linux. I wrote this specifically to give blind and visually impaired users a hint as to what I talk about alot on this site, so that they can make sense of it for themselves and choose which OS they want to use.</p>
<p>Thanks for reading.</p>
<i>Mikey</i>
      </article>
      </main>
  </body>
</html>
