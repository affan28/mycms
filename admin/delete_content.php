<?php
  // check if id is set in URL parameters
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
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
    $sql = "DELETE FROM form_data WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
      // redirect to content list page if the content is deleted successfully
      header("Location: ./display_content.php");
      exit();
    } else {
      echo "Error deleting content: " . mysqli_error($conn);
    }
    // close database connection
    mysqli_close($conn);
  } else {
    // display an error
    echo "Error: Content ID not specified.";
  }
?>
