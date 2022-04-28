<?php
   include("config.php");
   
   include('session.php');
   if($_SESSION['Username']=="")
   {
         $message = "Please Login";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: index.php");
   }

   $id = $_GET['id'];
   if (isset($_POST["submit"])) {
      $venueName = $_POST['VenueName'];
        $address = $_POST['Address'];
        $phoneNumber = $_POST['PhoneNumber'];
        $capacity = $_POST['Capacity'];
        $EventType = $_POST['EventType'];
        $USD = $_POST['USD'];
        
        $sql="Update venue SET name='$venueName',addr='$address',phone='$phoneNumber',capacity='$capacity',prefered='$EventType',money='$USD' WHERE Id='$id'";
        if ($db->query($sql) === TRUE) {
         $message = "Venue Updated";
         echo "<script type='text/javascript'>alert('$message');</script>";
      } 
      else 
      {
       $message = "Venue Update Failed";
       echo $db->error;
       echo "<script type='text/javascript'>alert('$message');</script>";
       
      }
      header("Location: AddVenue.php"); 
   }
   
?>
<html>
   
   <head>
      <title>Edit Venue</title>
      
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
      <h5 style="text-align:right;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
         <div style = "width:100%; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
            <div style = "background-color:#F5B041; color:#FFFFFF;height:30px; padding:3px;margin-top:5px;border-radius: 5px;text-align:center;"><b>Edit Venue</b></div>
				
            <div style = "margin:10px">
               <?php
                $id = $_GET['id']; 
               $result = $db->query("SELECT * FROM venue WHERE Id='$id'" );
               if( $row = $result->fetch_assoc() )
               {
                ?>
                
                <form  action = "" method = "post">
                
                <label for="VenueName"><b>Venue Name</b></label>
                <input type="text" value="<?php echo( $row['name']  ); ?>" name="VenueName" id="VenueName" required>

                <label for="Address"><b>Address</b></label>
                <input type="text" value="<?php echo( $row['addr']  ); ?>" name="Address" id="Address" required>

                <label for="PhoneNumber"><b>Phone Number</b></label>
                <input type="text" value="<?php echo( $row['phone']  ); ?>" name="PhoneNumber" id="PhoneNumber" required>

                <label for="Capacity"><b>Capacity</b></label>
                <input type="Text" value="<?php echo( $row['capacity']  ); ?>" name="Capacity" id="Capacity" required>

                <label for="PrefferedFor"><b>Preffered For</b></label>
                <br>
                
                <?php     
                          
                if($r_set = $db->query("SELECT EventType FROM EventType")){

                echo "<select  id=EventType name=EventType  style='width:100%;height:50px;'>";
                echo "<option value=All>All</option>";
                while ($row1 = $r_set->fetch_assoc()) {
                if( $row['prefered']==$row1['EventType'])
                {
                    echo "<option selected='selected' value=$row1[EventType]>$row1[EventType]</option>";
                }
                else
                {
                    echo "<option value=$row1[EventType]>$row1[EventType]</option>";
                }
                
                }
                echo "</select>";
                }
                else{
                    echo $connection->error;
                    }
                ?>
                <br>
                <br>

                <label for="USD"><b>USD</b></label>
                <input type="Text" value="<?php echo( $row['money']  ); ?>" name="USD" id="USD" required>

                

                <button style="background-color:#5DADE2; border-radius:2px;color:white;float: left;width:100px;height:40px;" type="submit" name="submit" class="btn btn-primary btn-block btn-large">Update</button>
                
               <button style="background-color:#E74C3C; border-radius:2px;color:white;float: right;width:100px;height:40px;margin-left:10px;" onclick=window.location.href='welcome.php'  name="submit" class="btn btn-primary btn-block btn-large">Back</button>
        
               </form>
               <?php
               }
               ?>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
               <br><br>
            </div>
				
         </div>
         
      </div>
      
   </body>
</html>