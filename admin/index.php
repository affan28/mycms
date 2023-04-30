<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        input[type="text"], textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
}

textarea {
  resize: vertical;
  height: 200px;
  cols: 16;
  width:50%;
}
<style>
		input[type="submit"] {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 24px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
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
      <li><?php
  // set the timezone to your country
  date_default_timezone_set('Asia/Kolkata');
  // get the current timestamp
  $timestamp = time();
  // format the timestamp to display the time in a custom format
  $time = date('l, F j, Y \a\t h:i A', $timestamp);
  // output the time
  echo " $time";
?></li>
    </ul>
  </div>
      
      <div class="main-content">
          <h1>Welcome to the Admin Panel</h1>
          <p>Here you can manage all aspects of your website.</p>
    </div>
        </div>
  </body>
</html>

