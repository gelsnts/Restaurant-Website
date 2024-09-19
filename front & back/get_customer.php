<!DOCTYPE html>
<html>

<head>

    <title> Reservation </title>

    <h1 align="center">List of Profiles</h1>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');
        body {
            background-image: url(images/recordbg.jpg);
            background-size: cover;
            background-position: center;
        }

        h1 {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            padding: 10px;
        }

        table {
            border-radius: 12px 12px 0 0;
            width: 70%;
            margin: auto;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 1px 10px rgba(64, 64, 64, .7);
            border-radius: 5px;
        }

        tr, th, td {
            border: 1px;
            border-collapse: collapse;
            padding: 12px;


        }

        th, td {
            text-align: left;
            vertical-align: top;

        }

        tr:nth-child(even) {
            background-color: #ebe891;
        }

        input[type="submit"] {
            width: 5%;
            height: 30px;
            border: 1px solid;
            background: #a89639;
            border-radius: 25px;
            font-size: 14px;
            border-color: #a89639;
            color: black;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            margin: 30px 48%;
        }

        input[type="submit"]:hover {
            text-shadow: #666666;
            background-color: #ebe891;
            border-color: white;
            transition: 1s;
        }
    </style>

    <body>

        <?php
   
   include 'db_connection.php';
  $conn = OpenCon();
  if(isset($_GET['customer_id']))
            {
                $profile_id=$_GET['customer_id'];

                $sql = "DELETE FROM `profile` WHERE `profile_id`='$profile_id'";
                $result = mysqli_query($conn, $sql);
                if($result){
                  echo 'deleted successfully';
              }
              else{
                  echo 'error';
              }

            }

	
    
    $sql_query = "SELECT customer_id, fname, homeadd, phonenum, user_email FROM customer";
    
    $result = mysqli_query($conn, $sql_query);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> 
	   <tr>
       <th> Customer ID </th> 
	   <th> Full Name</th>
       <th> Address</th> 
	   <th> Phone Number</th> 
       <th> Email </th>
	   <th> Action </th>
	   </tr>';
     
	 while($row = mysqli_fetch_assoc($result)){
        
           echo '<tr > 	
						<td>' . $row["customer_id"] . '</td>
						<td>' . $row["fname"] . '</td>
						<td>' . $row["homeadd"] . '</td>
                        <td>' . $row["phonenum"] . '</td>
                        <td>' . $row["user_email"] . '</td>
                        <td> <a href= "get_customer.php?customer_id=' . $row["customer_id"] . '" class = "button">Delete</a></td>
                        </tr>';
       }
       echo '</table>';
    }
    else
    {
        echo "<center>NO RESULTS</center>"; 
    }
  
    mysqli_close($conn);
    ?>
            <form action="AngelineSantos_reservation.php" method="post">
                <input type="submit" name="book" value="Add +">
            </form>


    </body>

</html>