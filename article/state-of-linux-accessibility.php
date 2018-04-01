<!DOCTYPE html>
<html>
  <head>
    <?php
      $TITLE = "State of Linux Accessibility";
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
        echo create_article_info(3);
      ?>
       <article>
<h3>Introduction</h3>
<p>I am writing this article because there is barely any documentation or even reviews like this about linux accessability. 
I spent ages going through forum posts and old documentation that didn't really apply anymore and came up with this. </p>
<p>Now, before I start, I don't mean to bash the linux community in any way because of the lack of documentation, because I can see exactly why there isn't much documentation online about this. First of all, <strong>how many developers are blind or visually impaired?</strong> And secondly, <strong>How many people who are blind or visually impaired run linux?</strong></p>

<p>I myself have had blindness from birth, as well as light sensitivity all my life, so when I got interested in computers, I was quickly disapointed in the level of accessability that they provided. </p>

<p>I played with computers for years without a screen reader or zoom, just high contrast, although given my age, I didn't really need a computer yet. Later I discovered narrator on windows XP and how bad it was, but at least it gave me a starting point. I also later found NVDA and how much better it was, but ultimately, I wasn't really happy with windows itself. </p>
<p>So, like I think most geeks would do ... I decided to get a mac. Voiceover, the built-in screen reader on the mac, was very good, but again, the mac desktop still didn't seem customisable enough. It wasn't a developer's desktop, just a standard, consumer focused desktop experience.</p>
<h3>But then I found linux...</h3>
<p>Linux, as far as I could tell by using my iPad to watch youtube videos, was what I had always dreamed of and, as I got older, I also started to really respect everybody making all open source projects possible. 
I loved-and still do love-the idea of opensource. The only thing holding me back was:</p> 
<ol>
<li>my old pentium 4 IBM thinkcenter with 1GB of ram  </li>
<li>the seeming lack of accessability software, more spicifically, screen readers out there for linux. </li>
</ol>
<p>I was going off barely documented ways of getting ORCA (what I say is the number 1 screen reader for linux) to work on desktops other than GNOME. 
I was doing this because gnome 3 had just been released and my old computer just couldn't handle it properly.. Not only that, but I had another problem. It was pretty hard to get linux installed because there was no accessible installer.</p>
<i>At least I thought</strong>
<p>Well, after about 4 years of trying, I have to say that my situation, as well as, I can immagine, the situations of various other people, has changed.</p>

<h3>debian - the ideal solution</h3>

<p>Yes. Somewhat surprisingly to me, plain old debian was the best option for me. For a start, debian has a command line speach installer accessible at least for the net install CD image and the main debian ISOs. </p>
<p><strong>By pressing <u>S</u> at the boot menu for the cd</strong>, it will load the TTY and start a completely accessible speach installer with all the regular options.</p>
<p> This enabled me to install linux, but I originally thought I would still have to use gnome, or modify an XFCE or mate installation for it to work (which required site). Amazingly though, that was not the case. I tried XFCE with a debian base, got it installed, rebooted, pressed enter on the grub screen, waited, saw the log in screen come up and then, shockingly to me, heard espeak say "screen reader on". Lets just say I was very happy to here those synthasised, robotic words. Most of the XFCE desktop is fully accessible out of the box on debian (if you use the command line installer) and I am actually using it to write this article. Some things are still not working though,such as the thunar powered XFCE4 desktop and icons and the file manager itself, but since I use a terminal for those things anyway, I don't really care.</p>

<p>I also tried mate, thinking that the gnome 2 fork would be lighter on resources than gnome 3, but also accessible because of it's roots and it worked flawlessly. I would really like to thank debian, as well as the creators of the XFCE, mate and not forgetting gnome desk tops for making linux completely usable for me as a main operating system.</p>
<h3>ubuntu mate</h3>
<p>After using debian for ages, I decided to buy another used computer (HP dc-5700, 2007). This shipped with windows xp, but I replaced it with ubuntu mate, just to see if I could make it accessible. 
I was glad to discover that, not only were the accessability settings set correctly out of the box, but orca was also pre-installed and fully working.</p> 
<p><strong>I love this distro,</strong> as well as the team who made it and clearly they know what they're doing. I have since reloaded standard ubuntu unity on to it, but have switched back to the LTS ubuntu mate 16.04 and now 17.04, as unity, while accessible, is just not my cup of tea.</p>
<h3>added usability - compiz</h3>
<p>I originally thought that compiz would be more of a pain than a benefit, because of my older hardware, but actually, especially on the ubuntu-mate machine, it ran really well and gave me access to one of the most needed features for me, “<strong>negative</strong>”.</p>
<p>I used invert colours on my mac so much, I began to miss it on linux. When I found out about the negative plug-in for compiz, I gave it a try. Not only can you invert the whole screen, but the plug-in is even better than the mac's version, because you can choose to invert only the current window as well. I also tried to play around with the "enhanced zoom desktop" function, but because it wasn't esential, I didn't get very far with it.</p>
<p>One of the reasons why I probably didn't get very far and this is <strong>a minor gripe I have</strong>, is that the compizconfig settings manager is not very accessible, in that orca doesn't speak the labels of text boxes and key selection fields. While I can live with this, it's a major pain setting compiz up, as I have to basically guess what entry does what.</p>
<p>I don't have to mess with it now though, because all it takes is one tweak in the mate-tweak control pannel in ubuntu mate and compiz is my default window manager. Even better, the negative and zoom plug-ins are enabled out of the box so all you have to do is hit the correct key combo.</p>
<h3>the tradeoff - qt application support</h3>
<p>Because I use orca as my screen reader, which is based on gnome, meaning it works best with gtk applications, I have had some quite major problems with qt  application support. Before anyone tells me, yes i've heard of jovie for kde, but I honestly can't wrap my head around how to set it up properly or even what on earth it is. I have qt accessability enabled and that gives me some support, but if I try to run, say, kdenlive, I get no output from orca. I would love to see someone work on this more, as it is the only thing holding me back right now.</p>
<h3>conclusion</h3>
<p>To some up, I honestly think that linux is more accessible than windows. I can't, as far as I know, install windows with a screen reader. Also, the gtk standard is pretty common, so I think that most applications are accessible, whereas on windows or mac, some software providers (microsoft office for mac) decide to use a none standard way of laying out widgets. Therefor, I have more of a chance of either getting accessability support out of the box with linux apps, or somehow being able to modify settings to get it to work.</p>

<p>I hope you enjoyed reading this, but that's all for now. I may publish more articles about this subject in the future, especially how to get things working articles, but you'll just have to wait and see. Linux command line accessibility is quite high up on the list right now</p>
<i>Mikey</i>
      </article>
      </main>
  </body>
</html>
