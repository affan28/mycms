<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/mycms/db/db_config.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // valid user, start session and redirect
            session_start();
            $_SESSION['username'] = $username;
            header("Location: /mycms/admin/");
            exit();
        } else {
            // invalid user
            echo "Invalid username or password.";
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple CMS Dashboard</title>
	<style>
		/* Global styles */
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f8f8;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}

		/* Header styles */
		.header {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			background-color: #fff;
			box-shadow: 0 2px 4px rgba(0,0,0,.1);
			padding: 10px;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.header h1 {
			margin: 0;
			font-size: 36px;
			color: #333;
		}
		.header nav a {
			margin-left: 20px;
			text-decoration: none;
			color: #333;
			font-size: 18px;
			font-weight: bold;
			transition: color 0.3s ease;
		}
		.header nav a:hover {
			color: #007bff;
		}
		
		/* Top navbar styles */
		.topnav {
			background-color: #333;
			overflow: hidden;
		}
		.topnav a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
			transition: background-color 0.3s ease, color 0.3s ease;
		}
		.topnav a:hover {
			background-color: #007bff;
			color: #fff;
			text-decoration: none;
		}

		 /* Main content styles */
		.main-content {
			margin-top: 80px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 2px 4px rgba(0,0,0,.1);
			border-radius: 4px;
		}
		.main-content h2 {
			margin-top: 0;
			margin-bottom: 20px;
			font-size: 28px;
			color: #333;
		}
		.main-content p {
			font-size: 16px;
			line-height: 1.5;
			color: #555;
		}

		/* Sidebar styles */
		.sidebar {
			background-color: #fff;
			box-shadow: 0 2px 4px rgba(0,0,0,.1);
			border-radius: 4px;
			padding: 20px;
			height: 100%;
		}
		.sidebar h3 {
			margin-top: 0;
			font-size: 20px;
			color: #333;
		}
		.sidebar ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}
		.sidebar li {
			margin-bottom: 10px;
		}
		.sidebar a {
			color: #333;

        }
        .login-container {
  width: 300px;
  margin: auto;
  text-align: center;
}
.button-container {
  margin-top: 20px;
}
button, .signup-link {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-right: 10px;
  cursor: pointer;
  font-size: 16px;
}

button:hover, .signup-link:hover {
  background-color: #3e8e41;
}

.signup-link {
  text-decoration: none;
}


.login-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 28px;
    color: #333;
    text-align: center;
}

.login-container label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #f2f2f2;
    color: #333;
    margin-bottom: 20px;
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}

.login-container input[type="text"]:focus,
.login-container input[type="password"]:focus {
    outline: none;
    box-shadow: inset 0 2px 4px rgba(0,0,0,.1);
}

.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.button-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    color: #fff;
    background-color: #007bff;
    cursor: pointer;
    transition: all .2s ease-in-out;
}

.button-container button:hover {
    background-color: #0069d9;
}

.error-message {
    color: #f00;
    margin-top: 10px;
    text-align: center;
}

    </style>
</head>
<body>
	<!-- Top navbar -->
	<div class="topnav">
		<a href="/mycms/">Home</a>
		<a href="../login/">Dashboard</a>
	</div>

	<!-- Header -->
	<div class="header">
  <h1>login to your dashboard</h1>
  <nav>
  <div class="login-container">
  <h2>Login</h2>
  <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post" action="/mycms/admin/">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="button-container">
            <button type="submit">Login</button>
            <button type="reset">Clear</button>
            <a href="/mycms/admin/signup" class="signup-link">Sign Up</a>
        </div>
    </form>
</div>
        
    </form>
</div>


  </nav>
</div>
		
