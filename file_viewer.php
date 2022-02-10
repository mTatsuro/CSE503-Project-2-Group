<!DOCTYPE HTML>
<html lang="en">
<head><title>Your files</title></head>
<body>

  <!-- Log out functionality -->
  <form name="input" action="log_out.php" method="get">
    <p>
      Log out here:
      <input type="submit" value="Log out">
    </p>
  </form>

  <!-- File uploading functionality -->
  <form enctype="multipart/form-data" action="uploader.php" method="POST">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		  <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	  </p>
    <p>
      <input type="submit" value="Upload">
    </p>
  </form>

  <!-- Text editor functionality -->
  <form name="input" action="text_editor.html" method="get">
    <p>
      You can create, edit, and save your text file from here:
      <input type="submit" value="Create">
    </p>
  </form>

  <!-- Display all the files uploaded by the user -->
  <form action="file_handler.php" method="POST">
    Below is all the files you have here.<br>
    <?php
    session_start();
    $path = "/srv/uploads/".$_SESSION['username'];
    $files = scandir($path);
    foreach ($files as $file) {
      if ($file != '..' and $file != '.'){
        echo '<input type="radio" name="file"';
        echo ' value= "'. $file . '">' . $file . ' <br>' . "\n";
      }
    }
    unset($file);
    ?>
    <input type="submit" name="file_action" value="View a file"/>
    <input type="submit" name="file_action" value="Delete a File"/>
  </form>
</body>
