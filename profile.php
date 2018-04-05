<!DOCTYPE html>
<html>
  <head>
    <?php 
        require_once("includes/db.connect.inc.php");
        $TITLE = 'Profile: '.$_GET['username'];
      ?>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="keywords" content="profile contributer author blindcomputing info information <?php echo $_GET['username']; ?>">
  </head>
    
  <body>
    <?php
      include_once("includes/nav.inc.php");
    ?>
    <main id="content">
      <?php
        $contributerError = '<h1>404 - Contributer Not Found</h2><p>Sorry, the contributer you\'re looking for does not appear to exist. Make sure you:</p><ol><li>Provided a username to this page</li><li>Spelled the username correctly</li></ol>';
        if(isset($_GET['username'])) {
          $username = $_GET['username'];
          // set up the database query and run it.
          $userResults = $db->prepare("select * from contributers where username=? limit 1;");
          $userResults->execute([$username]);
          if($userResults->rowCount()) {
            $user = $userResults->fetchObject();
            echo '<aside class="contributer-info"><h2>'.$user->username.'</h2>';
            echo '<table>';
            if($user->fullName != NULL) {
              echo '<tr><td><strong>Full Name: </strong></td><td>'.$user->fullName.'</td></tr>';
            }
            if($user->email != NULL) {
              echo '<tr><td><strong>Email: </strong></td><td><a target="blank" href="mailto:'.$user->email.'" title="Go to the GitHub profile for '.$user->username.'">'.$user->email.'</a></td></tr>';
            }
            if($user->github != NULL) {
              $githubUsername = substr(parse_url($user->github,PHP_URL_PATH),1);
              echo '<tr><td><strong>GitHub: </strong></td><td><a href="'.$user->github.'" title="Email '.$user->username.'">@'.$githubUsername.'</a></td></tr>';
            }
            if($user->twitter != NULL) {
              $twitterUsername = substr(parse_url($user->twitter,PHP_URL_PATH),1);
              echo '<tr><td><strong>Twitter: </strong></td><td><a href="'.$user->twitter.'" title="Go to the Twitter Profile for '.$user->username.'">@'.$twitterUsername.'</a></td></tr>';
            }
            if($user->youtube != NULL) {
              echo '<tr><td><strong>YouTube: </strong></td><td><a href="'.$user->youtube.'" title="Go to '.$user->username.'\'s YouTube Channel">'.$user->username.'\'s Channel</a></td></tr>';
            }
            echo '</table></aside>';
          } else
            echo $contributerError;
        }
      ?>
<!-- some test text where the contributer's description will go. -->
<section id="contributer-description">
<p>Lorem ipsum dolor sit amet consectetur, adipiscing elit vitae massa habitant, tristique mus odio curae. Lectus ornare egestas curae turpis congue dis bibendum pretium eu, facilisi accumsan urna senectus lacus convallis rutrum inceptos, potenti magna mauris ante justo sem viverra eleifend. Phasellus morbi ullamcorper vel litora dis eleifend accumsan, luctus nisi et tristique cum metus eu curae, habitasse cras class venenatis pellentesque senectus. Mauris a nam ullamcorper ridiculus habitasse sociosqu semper, aenean tellus nisi mi commodo id maecenas rutrum, sodales imperdiet sed integer aptent vitae. Pulvinar natoque nullam aliquet tincidunt pharetra tortor lectus cubilia, sed et eleifend commodo mattis conubia lacus, nam nisl a turpis integer ullamcorper posuere.</p>

<p>Justo convallis vitae nisi vulputate etiam pretium mauris himenaeos, donec inceptos eget penatibus vestibulum augue nostra varius feugiat, mollis phasellus tempor purus interdum ut metus. Suspendisse risus sagittis pretium lectus nascetur ornare dapibus litora, est pellentesque malesuada sem commodo congue dictumst euismod fusce, pharetra imperdiet tempus interdum conubia ridiculus phasellus. Tempor vitae porttitor conubia et massa platea eu habitant, semper magnis aptent vivamus congue integer venenatis mi, sem facilisis accumsan diam nibh dis morbi. Aliquet fringilla nibh euismod ut natoque gravida dictumst auctor magna praesent, duis lobortis nunc parturient potenti mus enim nec platea nisl fames, velit torquent cursus sapien justo cum magnis venenatis erat. Suscipit pharetra suspendisse iaculis tortor sociis vehicula vivamus sapien, maecenas tincidunt elementum morbi et lobortis senectus non porttitor, placerat donec neque condimentum accumsan purus ante. Ac lacinia diam erat habitasse felis parturient urna nostra, mattis malesuada pellentesque cras scelerisque interdum cum, consequat aptent metus massa arcu maecenas nam. Nam congue cursus neque enim molestie nisl auctor risus interdum tristique tincidunt nascetur curae, taciti viverra purus magna facilisi aptent aliquet vehicula faucibus malesuada rhoncus accumsan.</p>
</section>
    </main>
  </body>
</html>
