<?php
session_start();
$filename = $_POST['file'];
$file_action = $_POST['file_action'];

# Choose what to do with the file depending on the chosen action
if ($file_action == "View a file"){   # Viewing file
  header("Location: gen_file_path.php?file=$filename");
  exit;
} elseif ($file_action == "Delete a File"){   # Deleting file
  header("Location: delete.php?file=$filename");
  exit;
}
?>
