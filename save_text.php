<?php
session_start();

// Get the filename and make sure it is valid
$filename = $_GET["filename"].'.txt';
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

// Get the file content
$content = $_GET['content'];

$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

if( file_put_contents($full_path, $content)==false ){
	header("Location: upload_failure.html");
	exit;
}else{
	header("Location: upload_success.html");
	exit;
}

?>
