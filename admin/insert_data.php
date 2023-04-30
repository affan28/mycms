<?php
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

// If form is submitted
if(isset($_POST['submit'])){
    $long_text = $_POST['long_text'];
    $content = $_POST['content'];

    // Insert data into database
    $sql = "INSERT INTO form_data (long_text, content) VALUES ('$long_text', '$content')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        // redirect to a specific URL
        header("Location: /mycms/admin/content.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
