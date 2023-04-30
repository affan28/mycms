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
     /* Style for all links */
  a {
    color: #0077cc; /* link color */
    text-decoration: none; /* remove underline */
  }
  
  /* Style for edit link */
  a.edit-link {
    background-color: #4CAF50; /* button color */
    color: white; /* text color */
    padding: 8px 12px; /* add some padding */
    border-radius: 4px; /* add some rounded corners */
  }
  
  /* Style for delete link */
  a.delete-link {
    background-color: #f44336; /* button color */
    color: white; /* text color */
    padding: 8px 12px; /* add some padding */
    border-radius: 4px; /* add some rounded corners */
  }
  
  /* Hover style for all links */
  a:hover {
    text-decoration: underline; /* add underline on hover */
  }
  
  /* Hover style for edit link */
  a.edit-link:hover {
    background-color: #3e8e41; /* darker button color on hover */
  }
  
  /* Hover style for delete link */
  a.delete-link:hover {
    background-color: #da190b; /* darker button color on hover */
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
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
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
          // database connection code here

          $sql = "SELECT * FROM form_data";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>".$row['long_text']."</td>";
              echo "<td>".$row['content']."</td>";
              echo "<td><a href='edit_content.php?id=".$row['id']."' class='edit-link'>Edit</a> | <a href='delete_content.php?id=".$row['id']."' class='edit-link'>Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
          }

          // close database connection
          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
