<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="styles/style.css">
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }
    
    th, td {
      text-align: left;
      padding: 12px;
    }
    
    th {
      background-color: #4CAF50;
      color: white;
      font-weight: bold;
    }
    
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    
    tr:hover {
      background-color: #ddd;
    }
    input[type=text], textarea {
        width: 50%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
}

input[type=text]:focus, textarea:focus {
        border-color: #4CAF50;
}
button[type=submit] {
  background-color: #4CAF50;   
  border: none;
  color: white;
  padding: 12px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}
button[type=submit]:hover {
  background-color: #90ee90;  
  
}


  </style>
</head>
<body>
  <div class="sidebar">
  <ul>
      <li><a href="./">Dashboard</a></li>
      <li><a href="content.php">Content</a></li>
      <li><a href="#">Ads</a></li>
      <li><a href="./display_content.php">Content List</a></li>
      <li><a href="../">Home Page</a></li>
    </ul>
  </div>

  <div class="main-content">
    <table>
      <thead>
        <tr>
          <th>Long Text</th>
          <th>Content</th>
        </tr>
      </thead>

      <?php
        // check if id is set in URL parameters
        if(isset($_GET['id'])) {
          // retrieve the content to edit from the database
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
          $sql = "SELECT * FROM form_data WHERE id = '$id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          // close database connection
          mysqli_close($conn);

          // display the form with the retrieved content data
          echo "<h2>Edit Content</h2>";
          echo "<form action='update_content.php' method='POST'>";
          echo "<tr>";
          echo "<td><label for='long_text'>Long Text:</label></td>";
          echo "<td><input type='text' id='long_text' name='long_text' value='" . $row['long_text'] . "'></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td><label for='content'>Content:</label></td>";
          echo "<td><textarea id='content' name='content'>" . $row['content'] . "</textarea></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td colspan='2'><button type='submit' name='submit'>Save Changes</button></td>";
          echo "</tr>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
          echo "</form>";
        } else {
          // display an error
          echo "<tr><td colspan='2'>Error: Content ID not specified.</td></tr>";
        }
      ?>
    </table>
  </div>
</body>
</html>
