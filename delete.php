<?php
session_start();

// Get the filename and make sure it is valid
$filename = $_GET['file'];
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

$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

# Set the Content-Type header to the MIME type of the file, and delete the file
header("Content-Type: ".$mime);
header('content-disposition: inline; filename="'.$filename.'";');
unlink($full_path);
header("Location: file_viewer.php");
exit;
?>
