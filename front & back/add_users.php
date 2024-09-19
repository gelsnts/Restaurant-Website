<?php
include 'db_connection.php';
$conn = OpenCon();

if(isset($_POST['register']))

{	
	 $username = $_POST['username'];
	 $user_email = $_POST['user_email'];
	 $user_password = $_POST['user_password'];
	 $fname = $_POST['fname'];
	 $phonenum = $_POST['phonenum'];
	 $homeadd = $_POST['homeadd'];

	 $sql_query = "INSERT INTO user_account (username, user_email, user_password)
	 VALUES ('$username','$user_email','$user_password')";
	 $mysqli_query=mysqli_query($conn, $sql_query) or die (mysqli_error($conn));
	 if ($mysqli_query==1) 
	 {
		$sql_query = "INSERT INTO profile (fname, phonenum, homeadd) VALUES ('$fname','$phonenum','$homeadd')";
		$mysqli_query=mysqli_query($conn, $sql_query) or die (mysqli_error($conn)); 
		if ($mysqli_query==1)
		{
			echo "Data Added Successfuly!";
			
		}
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

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
	else
	{
		echo "<script>alert('The email or password you’ve entered is incorrect.');</script>";
	}
	if(isset($_SESSION["user_email"]))
	{
		header("Location: AngelineSantos_userhomepage.html");
		exit();
	}
}

?>
