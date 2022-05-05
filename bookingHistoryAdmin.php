<?php
include("config.php");
include('session.php');
ini_set('display_errors', 1);
date.timezone = Europe/Paris;
if($_SESSION['Username']=="")
   {
         $message = "Please Login";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: index.php");
   }
?>
<!DOCTYPE html>
   
   <head>
   <h5 style="text-align:right;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
      <title>Booking History</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
            
         }
         input[type=text], input[type=password],input[type=Email] {
            height:10px;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border-color:#CCD1D1;
            width:100%;
            outline: none;
            }

           
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	<br><br>
      <div  align = "left" >
    
         <div style = "width:100%; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
            <div style = "background-color:#F5B041; color:#FFFFFF;height:30px; padding:3px;margin-top:5px;border-radius: 5px;text-align:center;"><b>Booking History</b></div>
				
            <div style = "margin:10px">
             <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
               <br><br>
            </div>
				
         </div>
         
      </div>
      <?php
        $sql = "SELECT * FROM book_event ";
        $result = mysqli_query($db,$sql);

        echo "<table border='1' style='width:100%;'>
        <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Event Type</th>
        <th>Venue</th>
        <th>Guests</th>
        <th>Date</th>
        <th>Equipments</th>
        <th>Food Type</th>
        <th>Amount</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
         $now = new DateTime();
         $date = new DateTime($row['date']);
      if($date<$now)
      {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['CustomerName'] . "</td>";
        echo "<td>" . $row['e_type'] . "</td>";
        echo "<td>" . $row['place'] . "</td>";
        echo "<td>" . $row['no_guest'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['equip'] . "</td>";
        echo "<td>" . $row['f_type'] . "</td>";
        echo "<td>" . $row['total'] . "</td>";
        
        echo "</tr>";
      }
        }
        echo "</table>";

        mysqli_close($con);
        ?>
        <br>
      <button style="background-color:#E74C3C; border-radius:2px;color:white;float: right;width:100px;height:40px;margin-left:10px;" onclick=window.location.href='welcome.php'  name="submit" class="btn btn-primary btn-block btn-large">Back</button>
        
   </body>
</html>
