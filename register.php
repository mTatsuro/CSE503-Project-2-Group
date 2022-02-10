<!DOCTYPE HTML>
<html lang="en">
<head><title>Log in Portal</title></head>
<body>
  <?php

  # Get new username and check if it's valid
  $new_username = trim($_GET["new_username"]);
  if( !preg_match('/^[\w_\-]+$/', $new_username) ){
  	echo "Invalid username. Username should not contain special characters such as _ and -.";
  	exit;
  }

  # Initializing an array that contains already used usernames
  $usernames = array();
  $h = fopen("/srv/uploads/user.txt", "r");
  while( !feof($h)){
    array_push($usernames, trim(fgets($h)));
  }
  fclose($h);

  # Check if the entered username is already used
  if (in_array($new_username, $usernames)){ # when username entered is used
    echo "The entered username is already used. Pick something else. ";
    exit;
  }

  # Register the new user
  $full_path = sprintf("/srv/uploads/%s", $new_username);
  mkdir($full_path, 0777, true); # create a new directory to store the new user's files
  $registrar = fopen(sprintf("/srv/uploads/user.txt"), "a");
  fwrite($registrar, "\n".$new_username);
  fclose($registrar);
  echo "We've successufully added your new username!";
  ?>
</body>
