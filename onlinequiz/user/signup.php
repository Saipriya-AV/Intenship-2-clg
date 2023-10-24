<?php
        include_once dirname(dirname(__FILE__)).'\database\database.php';

	session_start();
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$college = $_POST['college'];
		$college = stripslashes($college);
		$college = addslashes($college);
		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Already Registered Email!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Registered Successfully!');</script></h3></center>";
			header('location:index.php');
		}
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, #284d70, #738d86);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .signup-form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            position: relative;
            z-index: 2;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        .signup-form input,
        .signup-form select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: transparent;
            outline: none;
            transition: border-color 0.3s;
            color: #333;
            box-sizing: border-box; /* Add this line to fix the margin issue */
        }

        .signup-form input::placeholder {
            color: #aaa;
        }

        .signup-form input:focus,
        .signup-form select:focus {
            border-color: #3498db;
        }

        .signup-form input:focus::placeholder {
            color: transparent;
        }

        .signup-form button {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .signup-form button:hover {
            background-color: #333;
        }

        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link:hover {
            color: black;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <div class="signup-form-container">
            <form class="signup-form" method="POST">
                <h2>Signup</h2>
                <br>
                <input type="text" id="name" name="name" placeholder="Name" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="text" name="college" placeholder="College" required />
                <input type="password" id="password" name="password" placeholder="Password">
                <button type="submit" name="submit" id="signupButton">Sign Up</button>
            </form>
            <br>
            <br>
            <a href="login.php" class="login-link">Already registered? Login here.</a>
        </div>
    </div>
</body>
</html>
