<!doctype html>
<html>
  <head>
    <?php 
        require_once("includes/db.connect.inc.php");
        $TITLE = 'Profile: '.$_GET['username'];
      ?>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="keywords" content="profile contributor author blindcomputing info information <?php echo $_GET['username']; ?>">
    <title>BlindComputing | Profile: <?php echo $_GET['username']; ?></title>
  </head>
    
  <body>
    <?php
      include_once("includes/nav.inc.php");
    ?>
    <main id="content">
      <?php
        $contributor_error = '<h1>404 - Contributer Not Found</h1><p>Sorry, the contributor you\'re looking for does not appear to exist. Make sure you:</p><ol><li>Provided a username to this page</li><li>Spelled the username correctly</li></ol>';
        $multiple_contributor_error = '<h1>Multiple contributors found: something is very very wrong!</h1><p>Please contact the blind computing team to report this error and give them the address of the page. Then just click the back button and forget about this.</p>';
        if(isset($_GET['username'])) {
          $username = $_GET['username'];
          // set up the database query and run it.
          $userResults = $db->prepare("select * from contributors where username=? limit 1;");
          $userResults->execute([$username]);
          if($userResults->rowCount() == 1) {
            $user = $userResults->fetchObject();
            echo '<header class="profile-info">';
            if($user->imguri != NULL) {
              echo '<img class="profile-img" width="15%" aria-label="Profile picture for '.$user->username.'." src="'.$user->imguri.'">';
            }
            echo '<h2 class="profile-header">'.$user->username.'\'s Profile</h2>';
            if($user->fullName != NULL) {
              echo '<h3 class="profile-subheader">'.$user->fullName.'</h3>';
            }
           echo '<table class="profile-information"><tbody>';
            if($user->email != NULL) {
              echo '<tr><th class="profile-th">Email: </th><td><a target="blank" href="mailto:'.$user->email.'" title="Email '.$user->username.'">'.$user->email.'</a></td></tr>';
            }
            if($user->github != NULL) {
              $githubUsername = substr(parse_url($user->github,PHP_URL_PATH),1);
              echo '<tr><th class="profile-th">Github: </th><td><a href="'.$user->github.'" title="Go to the GitHub profile for '.$user->username.'">@'.$githubUsername.'</a></td></tr>';
            }
            if($user->twitter != NULL) {
              $twitterUsername = substr(parse_url($user->twitter,PHP_URL_PATH),1);
              echo '<tr><th class="profile-th">Twitter: </th><td><a href="'.$user->twitter.'" title="Go to the Twitter Profile for '.$user->username.'">@'.$twitterUsername.'</a></td></tr>';
            }
            if($user->discordID != NULL && $user->discordName != NULL) {
              echo '<tr><th class="profile-th">Discord: </th><td>@'.$user->discordName.'#'.$user->discordID.'</a></td></tr>';
            }
            if($user->youtube != NULL) {
              echo '<tr><th class="profile-th">YouTube: </th><td><a href="'.$user->youtube.'" title="Go to '.$user->username.'\'s YouTube Channel">'.$user->username.'\'s Channel</a></td></tr>';
            }
            echo '</tbody></table>
                 <hr>
                 </header>
                 <article class="profile-description">'.$user->description.'</article>';
          } else if($userResults->rowCount() > 1) {
            echo $multiple_contributor_error;
          } else {
            echo $contributor_error;
          }
        } else {
          echo $contributor_error;
        }
      ?>
    </main>
  </body>
</html>
