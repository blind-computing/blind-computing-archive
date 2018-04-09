<!doctype html>
<html>
  <head>
    <?php 
        require_once("includes/db.connect.inc.php");
        $TITLE = 'Profile: '.$_GET['username'];
      ?>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="keywords" content="profile contributer author blindcomputing info information <?php echo $_GET['username']; ?>">
    <title>BlindComputing | Profile: <?php echo $_GET['username']; ?></title>
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
            echo '<aside class="contributer-info"><center><h2 class="contributer-header">'.$user->username.'</h2>';
            if($user->imguri != NULL) {
              echo '<img alt="profile picture for '.$user->username.'." src="'.$user->imguri.'" class="profile-img-sidebar" width="128px" height="128px">';
            }
            echo '</center><hr><table>';
            if($user->fullName != NULL) {
              echo '<tr><td><strong>Full Name: </strong></td><td>'.$user->fullName.'</td></tr>';
            }

            if($user->email != NULL) {
              echo '<tr><td><strong>Email: </strong></td><td><a target="blank" href="mailto:'.$user->email.'" title="Email '.$user->username.'">'.$user->email.'</a></td></tr>';
            }
            if($user->github != NULL) {
              $githubUsername = substr(parse_url($user->github,PHP_URL_PATH),1);
              echo '<tr><td><strong>GitHub: </strong></td><td><a href="'.$user->github.'" title="Go to the GitHub profile for '.$user->username.'">@'.$githubUsername.'</a></td></tr>';
            }
            if($user->twitter != NULL) {
              $twitterUsername = substr(parse_url($user->twitter,PHP_URL_PATH),1);
              echo '<tr><td><strong>Twitter: </strong></td><td><a href="'.$user->twitter.'" title="Go to the Twitter Profile for '.$user->username.'">@'.$twitterUsername.'</a></td></tr>';
            }
            if($user->youtube != NULL) {
              echo '<tr><td><strong>YouTube: </strong></td><td><a href="'.$user->youtube.'" title="Go to '.$user->username.'\'s YouTube Channel">'.$user->username.'\'s Channel</a></td></tr>';
            }
            echo '</table><hr></aside>';
          } else
            echo $contributerError;
        }
      ?>
      <section id="contributer-description">
        <?php
          if($user->description != NULL) {
            echo '<h3>Description</h3>';
            echo $user->description;
          } else
            echo '<p>This contributer has not submitted a description yet.</p>';
        ?>
      </section>
    </main>
  </body>
</html>
