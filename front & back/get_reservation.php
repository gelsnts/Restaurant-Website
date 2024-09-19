<!DOCTYPE html>
<html>

<head>

    <title> Reservation </title>

    <h1 align="center">List of Reservations</h1>
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

	
    
    $sql_query = "SELECT reservation_id, fname, reservation_date, reservation_time FROM reservation";
    
    $result = mysqli_query($conn, $sql_query);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> 
	   <tr>
       <th> Reservation ID </th> 
	   <th> Full Name</th>
	   <th> Reservation Date</th> 
	   <th> Reservation Time</th> 
	   </tr>';
     
	 while($row = mysqli_fetch_assoc($result)){
        
           echo '<tr > 	
						<td>' . $row["reservation_id"] . '</td>
						<td>' . $row["fname"] . '</td>
						<td>' . $row["reservation_date"] . '</td>
                        <td>' . $row["reservation_time"] . '</td>
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