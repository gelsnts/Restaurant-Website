<?php
include 'db_connection.php';
$conn = OpenCon();

if(isset($_POST['book']))
{
     $fname = $_POST ['fname'];
	 $reservation_date = $_POST['reservation_date'];
	 $reservation_time = $_POST['reservation_time'];


	 $sql_query = "INSERT INTO reservation (fname, reservation_date, reservation_time)
	 VALUES ('$fname','$reservation_date','$reservation_time')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "<script>alert('Reserved Sucessfully!');</script>";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>