<?php
	include_once dirname(dirname(__FILE__)).'\database\database.php';
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	$ref=@$_GET['q'];	
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$passwd = $_POST['passwdword'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$passwd = stripslashes($passwd); 
		$passwd = addslashes($passwd);
		$email = mysqli_real_escape_string($con,$email);
		$passwd = mysqli_real_escape_string($con,$passwd);		
		$str = "SELECT * FROM user WHERE email='$email' and password='$passwd'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Incorrect Username or Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			$_SESSION['id']=$row[0];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
			header('location: index.php'); 					
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto' !important;
            background: linear-gradient(to bottom right, #284d70, #738d86);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <form method="post" action="login.php" enctype="multipart/form-data" class="login-form">
        <h2>Welcome back!</h2>
        <input type="email" name="email" id="username" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <input class="custom-submit" type="submit" name="submit" value="Login" id="loginButton">
        <br><br>
    <a href="signup.php" class="login-link">Not registered? Sign Up here.</a>
    </form>
    
</body>
</html>
