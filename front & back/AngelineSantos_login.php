<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
        }

        .banner {
            width: 100%;
            height: 100vh;
            background-image: url(images/food-bg.jpg);
            background-size: cover;
            background-position: center;
        }

        .navbar {
            width: 85%;
            margin: auto;
            padding: 10px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 110px;
            cursor: pointer;
        }

        .navbar ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
        }

        .navbar ul li::after {
            content: '';
            height: 3px;
            width: 0;
            background: #ebdfa4;
            position: absolute;
            left: 0;
            bottom: -10px;
            transition: 0.3s;
        }

        .navbar ul li:hover::after {
            width: 100%;
        }

        .banner-area {
            width: 100%;
            height: 70vh;
            display: -webkit-flex;
            display: -moz-flex;
            display: -o-flex;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-size: 2vw;
            color: #fff;
        }

        .banner-area h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 80px;
            margin: 0 0 25px;
            animation: animate 2s 1;
        }

        .button {
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            transition: .6s;
            text-decoration: none;
            padding: 10px 45px;
            color: #fff;
            border: 2px solid #fff;
            opacity: 80%;
            animation: animate 2s 1;
        }

        .button:hover {
            background-color: #fff;
            color: #262626;
        }

        @keyframes animate {
            0% {
                transform: scale (0);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
    
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="AngelineSantos_homepage.html">Home</a></li>
                <li><a href="AngelineSantos_menu.html">Menu</a></li>
                <li><a href="#">Reservation</a></li>
                <li><a href="AngelineSantos_aboutus.html">About Us</a></li>
                <li><a href="AngelineSantos_gallery.html">Gallery</a></li>
                <li><a href="AngelineSantos_login.html">Login</a></li>
                <li><a href="AngelineSantos_registration.html">Register</a></li>
            </ul>
        </div>

</html>
<html lang="en" dir="ltr">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url(images/foodbg.jpg);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
            transition: 1s;
        }

        .center h1 {
            color: black;
            text-align: center;
            margin-bottom: 40px;
            margin-top: 40px;

        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }



        .text_field input {
            font-size: 15px;
            width: 100%;
            outline: none;
            padding: 12px 14px;
            margin-bottom: 15px;
            border-radius: 15px; 

        }

        .forgot {
            margin-bottom: 25px;
            font-size: 15px;
        }

        .forgot a {
            color: #a89639;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 70%;
            margin: 0 50px;
            height: 50px;
            border: 1px solid;
            background: #a89639;
            border-radius: 25px;
            font-size: 18px;
            border-color: #a89639;
            color: black;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            text-shadow: #666666;
            background-color: #c6d788;
            border-color: white;
            transition: 1s;
        }

        .reglink {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .reglink a {
            color: #a89639;
            text-decoration: none;
        }

        .reglink a:hover {
            text-decoration: underline;
        }
    </style>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
<?php
include 'db_connection.php';
$conn = OpenCon();
//login
if (isset($_POST['login']))
{
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	$result = "SELECT * FROM user_account WHERE user_email = '$user_email' and user_password = '$user_password'";
	$res = mysqli_query($conn, $result) or die (mysqli_error($conn));
	
	$row = mysqli_fetch_assoc($res);
	
	if(is_array($row))
	{
		$_SESSION['user_email'] = $row['user_email'];
		$_SESSION['user_password'] = $row['user_password'];
	}
	if(isset($_SESSION["user_email"]))
	{
		echo "<script> window.location.href='AngelineSantos_userhomepage.html'; </script>";
        exit();
	}
}
//admin
if (isset($_POST['login']))
{
	$admin_email = $_POST['user_email'];
	$admin_password = $_POST['user_password'];
	
	$result = "SELECT * FROM `admin` WHERE admin_email = '$user_email' and admin_password = '$user_password'";
	$res = mysqli_query($conn, $result) or die (mysqli_error($conn));

	$row = mysqli_fetch_assoc($res);
	
	if(is_array($row))
	{
		$_SESSION['admin_email'] = $row['admin_email'];
		$_SESSION['admin_password'] = $row['admin_password'];
	}
    if(isset($_SESSION["admin_email"]))
	{
		echo "<script> window.location.href='admin.html'; </script>";
	}
	else
	{
		echo "<script>alert('The email or password you’ve entered is incorrect.');</script>";
	}
	
}

?>
    <div class="center">
        <h1>Login</h1>
        <form action="AngelineSantos_login.php" method="post">
            <div class="text_field">
                <input type="email" name="user_email" required placeholder="Email">
                <span></span>
            </div>
            <div class="text_field">
                <input type="password" name="user_password" required placeholder="Password">
                <span></span>
            </div>
            <div class="forgot">
                <a href="AngelineSantos_forgot.html">Forgot Password?</a>
            </div>
            <p><input type="submit" name="login" id="login" value="Login"></p>
            <div class="reglink">
                Not a member? <a href="AngelineSantos_registration.html">Register</a>
            </div>
        </form>
    </div>

</body>

</html>
