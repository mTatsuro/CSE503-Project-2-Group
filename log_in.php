<?php

# Get username and check if it's valid
$username = trim($_GET["username"]);
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

# initializing an array that contains legal usernames
$usernames = array();
$h = fopen("/srv/uploads/user.txt", "r");
while( !feof($h)){
  array_push($usernames, trim(fgets($h)));
}
fclose($h);

# check if the entered username is on our list of usernames
if (in_array($username, $usernames)){ # when username entered is on the list
  session_start();
  $_SESSION['username'] = $username;
  header("Location: file_viewer.php");
  exit;
}else{ # when username entered is not listed
  echo "Your entered username, $username, is not in our list.";
}
?>
