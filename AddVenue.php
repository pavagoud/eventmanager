<?php
   include("config.php");
   
   include('session.php');

   if($_SESSION['Username']=="")
   {
         $message = "Please Login";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: index.php");
   }
   if (isset($_POST["submit"])) {
    
        $venueName = $_POST['VenueName'];
        $address = $_POST['Address'];
        $phoneNumber = $_POST['PhoneNumber'];
        $capacity = $_POST['Capacity'];
        $EventType = $_POST['EventType'];
        $USD = $_POST['USD'];
        
        $sql="INSERT INTO venue (name,addr,phone,capacity,prefered,money) VALUES ('$venueName','$address','$phoneNumber','$capacity','$EventType','$USD')";
        if ($db->query($sql) === TRUE) {
         $message = "Venue Inserted";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: AddVenue.php"); 
     } 
     else 
     {
      $message = "Venue Insert Failed";
      echo $db->error;
      echo "<script type='text/javascript'>alert('$message');</script>";
      header("Location: AddVenue.php"); 
     }
   }
?>
<html>
   
   <head>
      <title>Add Venue</title>
      
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
            a.linkClassEdit:link 
            {
               text-decoration:none;color:#2471A3;  
            }
            a.linkClassEdit:visited 
            {
               text-decoration:none;
            }

            a.linkClassDelete:link 
            {
               text-decoration:none;color:#E74C3C;  
            }
            a.linkClassDelete:visited 
            {
               text-decoration:none;
            }
           
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	<br><br>
      <div  align = "left" >
      <h5 style="text-align:right;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
         <div style = "width:100%; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
            <div style = "background-color:#F5B041; color:#FFFFFF;height:30px; padding:3px;margin-top:5px;border-radius: 5px;text-align:center;"><b>Add Venue</b></div>
				
            <div style = "margin:10px">
               
                <form  action = "" method = "post">
                
                <label for="VenueName"><b>Venue Name</b></label>
                <input type="text" placeholder="Enter Venue Name" name="VenueName" id="VenueName" required>

                <label for="Address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="Address" id="Address" required>

                <label for="PhoneNumber"><b>Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="PhoneNumber" id="PhoneNumber" required>

                <label for="Capacity"><b>Capacity</b></label>
                <input type="Text" placeholder="Enter Capacity" name="Capacity" id="Capacity" required>

                <label for="PrefferedFor"><b>Preffered For</b></label>
                <br>
                <?php                
                if($r_set = $db->query("SELECT EventType FROM EventType")){

                echo "<select  id=EventType name=EventType  style='width:100%;height:50px;'>";
                echo "<option value=All>All</option>";
                while ($row = $r_set->fetch_assoc()) {
                echo "<option value=$row[EventType]>$row[EventType]</option>";
                }
                echo "</select>";
                }else{
                echo $connection->error;
                }
                ?>
                <br>
                <br>

                <label for="USD"><b>USD</b></label>
                <input type="Text" placeholder="Enter Amount" name="USD" id="USD" required>

                

                <button style="background-color:#5DADE2; border-radius:2px;color:white;float: left;width:100px;height:40px;" type="submit" name="submit" class="btn btn-primary btn-block btn-large">Save</button>
                <button style="background-color:#E74C3C; border-radius:2px;color:white;float: right;width:100px;height:40px;margin-left:10px;" onclick=window.location.href='welcome.php'  name="submit" class="btn btn-primary btn-block btn-large">Back</button>
               
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
               <br><br>
            </div>
				
         </div>
         
      </div>
      
      <?php
        $sql = "SELECT * FROM venue";
        $result = mysqli_query($db,$sql);

        echo "<table border='1' style='width:100%;'>
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Capacity</th>
        <th>Preffered</th>
        <th>Amount</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['addr'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['capacity'] . "</td>";
        echo "<td>" . $row['prefered'] . "</td>";
        echo "<td>" . $row['money'] . "</td>";
        echo "<td>"?> <a href="editVenue.php?id=<?php echo $row['Id'] ?>" class="linkClassEdit">Edit</a> <?php "</td>";
        echo "<td>"?> <a href="deleteVenue.php?id=<?php echo $row['Id'] ?>" class="linkClassDelete">Delete</a> <?php "</td>";
        echo "</tr>";
        }
        echo "</table>";

        mysqli_close($con);
        ?>
   </body>
</html>