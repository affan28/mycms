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
    </ul>
  </div>
        <div class="main-content">
        <h1>Add your content for main here </h1>
        <form method="POST" action="insert_data.php">
            <label for="long_text">Title:</label><br>
            <input type="text" id="long_text" name="long_text" style="width: 400px;"><br><br>
            <label for="content">Your Content:</label><br>
            <textarea id="content" name="content" rows="8" cols="16"></textarea><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            if(isset($_POST['submit'])){
                $long_text = $_POST['long_text'];
                $content = $_POST['content'];
                echo "<p>Long Text: $long_text</p>";
                echo "<p>Content: $content</p>";
            }
        ?>
        </div>
  </body>
</html>
