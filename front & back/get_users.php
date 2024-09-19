<!DOCTYPE html>
<html>

<head>

    <title> Registered Users </title>

    <h1 align="center">List of Registered Users</h1>

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

        tr,
        th,
        td {
            border: 1px;
            border-collapse: collapse;
            padding: 12px;


        }

        th,
        td {
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
        button {
            width: 80px;
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
        }

        button:hover {
            text-shadow: #666666;
            background-color: white;
            border-color: white;
            transition: 1s;
        }
    </style>

    <body>

        <?php

        include 'db_connection.php';
        $conn = OpenCon();

        if(isset($_GET['user_id']))
        {
            $user_id=$_GET['user_id'];

            $sql = "DELETE FROM `user_account` WHERE 'user_id'='$user_id'";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location:get_users.php");
            }
            else{
                echo 'Error';
            }
        }

    $sql_query = "SELECT user_id, username, user_email, user_password FROM `user_account`";
    
    $result = mysqli_query($conn, $sql_query);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> 
	   <tr>
       <th> User ID </th> 
	   <th> Username</th>
	   <th> Email</th> 
	   <th> Password</th>
       <th> Actions <th> 
	   </tr>';
     
	 while($row = mysqli_fetch_assoc($result)){
        
           echo '<tr > 	
						<td>' . $row["user_id"] . '</td>
						<td>' . $row["username"] . '</td>
						<td>' . $row["user_email"] . '</td>
                        <td>' . $row["user_password"] . '</td>
                        <td> <a href= "get_users.php?user_id=' . $row["user_id"] . '" class = "button">Delete</a></td>
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
            <form action="AngelineSantos_registration.php" method="post">
                <input type="submit" name="register" value="Add +">
            </form>
            <form action="admin.php" method="post">
                <input type="submit" name="back" value="Back">
            </form>
    </body>

</html>