<?php
  // check if the form was submitted
  if(isset($_POST['submit'])) {
    // get the form data
    $id = $_POST['id'];
    $long_text = $_POST['long_text'];
    $content = $_POST['content'];

    // update the content in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myadmin_panel";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE form_data SET long_text='$long_text', content='$content' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      // close database connection
      mysqli_close($conn);
      // redirect to the display_content.php page
      header("Location: display_content.php");
      exit;
    } else {
      echo "Error updating content: " . mysqli_error($conn);
    }
  }
?>
