<!DOCTYPE html>
<html>
  <head>
    <?php
      $id = 24;
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
        echo create_article_info(6);
      ?>
       <article>
<h3>Introduction</h3>
<p>A long, long time ago, I wrote an article about <a href="/article/state-of-linux-accessibility.php">The State of Linux Desktop Accessibility</a> and how I was and am continuously using linux for my daily computing and developing needs. But one of the questions I know even I asked was: <strong>what is linux command line accessibility like?</strong> Well, this article's going to answer that.</p>
<h3>GUI Terminal Accessibility</h3>
<p>Before we get onto the meat and potatoes of this article, I'd like to take a moment to discuss terminal emulater accessibility for desktop environments. Here's some quick notes.</p>
<ol>
<li>The default x11 terminal emulater, <strong>XTerm</strong>, is not accessible in any way, shape or form. I believe this is due to the fact that XTerm doesn't use any GUI libraries like GTK or QT and interfaces with the X server more directly, but I've never cared enough to find out.</li>
<li>The terminal emulaters: <strong>xfce4-terminal</strong>, <strong>mate-terminal</strong> and <strong>gnome-terminal</strong> are fully accessible to my knowledge (I use all of them consistantly every day). I personally prefer mate-terminal, but the choice is yours.</li>
<li>I've just checked by installing it on my arch system and it appears that <strong>terminator</strong> is fully accessible, including split windows as long as you remember the keyboard shortcut <strong>ALT+Arrow Key</strong> to move between panes. I have not tested this extensively as of now, but will edit this article if I decide to test it out. Another thing to note is that because terminator uses separate GUI widgets for each split pane, unlike terminal agnostic split solutions like tmux and screen, creating verticle panes does not result in the screen reader reading both the line on the left and the line on the right where the cursor is at, so its a more usible feature for screen reader users.</li>
<li><strong>QT based terminals</strong> are to my knowledge not accessible at all (I just checked using <strong>konsole</strong> on arch XFCE), so these are off limits, at least for now.</li>
</ol>
<p>Okay, okay, that's enough! Now, let's get onto what you've all come here for: TTY accessiblity.</p>
<h3>Non GUI Linux Accessibility</h3>
<h4>Speakup</h4>
<p>Speakup is the kernel modual that makes linux TTY accessibility possible. You can find its home page at <a href="https://www.linux-speakup.org">This Link to the Speakup Home Page</a>, where you will find information, some useful, some really, really not (as it pertains to obscenely  expensive speech synthasisers that nobody has any more) about how to get speakup running and some basic commands.</p>
<p>Really though, this page isn't needed, as speakup works exactly how you'd expect it to work. Of course, if you want to learn how to use features like built-in copy and paste, the instructions on this page'll help you out, but for the most part, just things should just work.</p>
<p>Things will also just work because speakup is now integrated into the kernel of almost all distributions, so all you need to do is install a synthasiser, like ...</p>
<h4>ESpeakup</h4>
<p>ESpeakup is a common plugin for speakup. IT provides a bridge between speakup and the very common espeak speech synthasiser that everyone in the free assistive tech community uses, mostly due to its speed. This allows you to use speakup on a moddern system where you have more than enough power to synthasise speech in software, instead of throwing yourself back in the 90s, when you had to buy a speech synthasiser card and install drivers. It is a very basic modual, often under the name "<strong>espeakup</strong>" in most package managers and all it takes is an install to get it working.</p>
<p>The ESpeakup package usually sets up a SystemD service that auto-starts whenever the computer boots. However, you can always disable this service and enable it on demand when you need it.</p>
<h4>Supported Distros</h4>
<p>Many distributions are supported when it comes to installing and using speakup, but I've found one of the two following work the best. Of course, I haven't had experience with <i>all</i> distros, so feel free to contact me if you've got any recommendations.</p>
<h5>Debian</h5>
<p>The ever versitile debian comes to the rescue again. I mentioned in my last article how debian provides a "speech" mode in their install media. Well, if you install a debian based system without a graphical interface using this method, you will already have espeakup installed and working, as the installer sets it up for you when you use the speech installer. <strong>No further setup required</strong></p>
<h5>Arch Linux</h5>
<p>Yes, the good old, venerable arch linux has got you covered if you want a bleeding edge CLI, or for that matter GUI accessible experience. You'll need to download the <a href="https://talkingarch.tk/">Talking Arch ISO with ESpeakup support</a> and follow some extra steps when installing, documented in the <a href="https://wiki.archlinux.org/index.php/TalkingArch">Arch Linux Wiki Page for Talking Arch</a> and you'll have a fully working, speech enabled arch system.</p>
<h3>Conclusion</h3>
<p>It should come as no surprise to anyone that the linux command line is accessible. I mean, not only is the GUI very accessible, but the main use of linux today is on servers, where no GUI is installed, much less an accessible one. Needless to say, it works absolutely fine and is trivial to set up.</p>
<p>I hope you found this article helpful, but that's all for now. More articles are to come on various linux accessibility topics, including a tutorial on how to get a fully working arch linux desktop setup for the blind and visually impaired, so you can look forware to that.</p>
<i>Mikey</i>
      </article>
      </main>
  </body>
</html>
