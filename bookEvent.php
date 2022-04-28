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
        
     $venueName =  $_COOKIE['textVal'];
        //

        $NoGuest = $_POST['NoGuest'];
        $Date = $_POST['Date'];
        $Equipment = $_POST['Equipment'];
        $Food = $_POST['FoodType'];
        $EventType = $_POST['EventType'];
        $Total = $_POST['TotalAmount'];
        $userId=$_SESSION['Id'];
        $customerName=$_POST['customerName'];
        
        $sqlgetIDVenue="SELECT Id FROM venue where name='$venueName'";
        $resultIDVenue = mysqli_query($db, $sqlgetIDVenue);
        $rowIdVenue = mysqli_fetch_array($resultIDVenue, MYSQLI_ASSOC);
        $VenueId=$rowIdVenue['Id'];

        $sql="INSERT INTO book_event (e_type,place,no_guest,date,equip,f_type,total,CustomerID,Paid,CustomerName) VALUES ('$EventType','$VenueId','$NoGuest','$Date','$Equipment','$Food','$Total','$userId','1','$customerName')";
        $sqlGetId="SELECT MAX(Id)+1 as maxID FROM book_event";
        
        $resultId = mysqli_query($db, $sqlGetId);
        $rowId = mysqli_fetch_array($resultId, MYSQLI_ASSOC);
        $maxId=$rowId['maxID'];

        if ($db->query($sql) ===  TRUE) {
            $message = "Event Booked Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
            //header("Location: AddVenue.php"); 
        } 
        else 
        {
            $message = "Event Booked Failed";
            echo $db->error;
            echo "<script type='text/javascript'>alert('$message');</script>";
            //header("Location: AddVenue.php"); 
        }
   }
?>
<html>
   
   <head>
      <title>Book Event</title>
      
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
            <div style = "background-color:#F5B041; color:#FFFFFF;height:30px; padding:3px;margin-top:5px;border-radius: 5px;text-align:center;"><b>Book Event</b></div>
				
            <div style = "margin:10px">
               
                <form autocomplete="off" action = "" method = "post">
                
                <label for="customerName"><b>Customer Name</b></label>
                <input type="text"  name="customerName" value="<?php echo $_SESSION['Username'] ?>" id="customerName" required style="width:100%;height:30px;" >

                <label for="EventType"><b>Event Type</b></label>
                <?php                
                if($r_set = $db->query("SELECT EventType,Price FROM eventtype")){

                echo "<select  id=EventType name=EventType  style='width:100%;height:30px;'>";
                while ($row = $r_set->fetch_assoc()) {
                echo "<option value=$row[Price]>$row[EventType]</option>";
                }
                echo "</select>";
                }else{
                echo $connection->error;
                }
                ?>

                <label for="VenueName"><b>Venue</b></label>
                <?php                
                if($r_set1 = $db->query("SELECT name,Id,money FROM Venue")){

                echo "<select  id=VenueName name=VenueName onchange=getText(this);  style='width:100%;height:30px;'>";
                while ($row1 = $r_set1->fetch_assoc()) {
                echo "<option value=$row1[money]>$row1[name]</option>";
                }
                echo "</select>";
                }else{
                echo $connection->error;
                }
                ?>

                <label for="NoGuest"><b>No of Guests</b></label>
                <input type="number" placeholder="Enter No of Guests" name="NoGuest" id="NoGuest" required style="width:100%;height:30px;">
                <br>
                <label for="Date"><b>Date</b></label>
                <input type="Date"  name="Date" id="Date" required style="width:100%;height:30px;">
                <br>
                <label for="Equipment"><b>Equipment</b></label>
                <?php                
                if($r_set1 = $db->query("SELECT equip,Price FROM equipment")){

                echo "<select  id=Equipment name=Equipment  style='width:100%;height:30px;'>";
                while ($row1 = $r_set1->fetch_assoc()) {
                echo "<option value=$row1[Price]>$row1[equip]</option>";
                }
                echo "</select>";
                }else{
                echo $connection->error;
                }
                ?>
                <br>
                <label for="FoodType"><b>Food Type</b></label>
                <select name="FoodType" id="FoodType" style="width:100%;height:30px;">
                <option value="Marriage">Marriage</option>
                <option value="Birthday">Birthday</option>
                <option value="Family Function">Family Function</option>
                <option value="Awaiting">Awaiting</option>
                <option value="Farewell Party">Fairwell Party</option>
                <option value="College Party">College Party</option>
                </select>
                <br>
                <label for="TotalAmount"><b>Total</b></label>
                <input type="text" onclick= changeAmount();  name="TotalAmount" id="amt"   required>
                <button style="background-color:#5DADE2; border-radius:2px;color:white;float: left;width:100px;height:40px;" type="submit" name="submit" class="btn btn-primary btn-block btn-large">Save</button>
                <button style="background-color:#E74C3C; border-radius:2px;color:white;float: right;width:100px;height:40px;margin-left:10px;" onclick=window.location.href='welcomeUser.php'  name="submit" class="btn btn-primary btn-block btn-large">Back</button>
               
               </form>
               <input  type="hidden" name="hiddenField" id="hiddenField" />
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
               <br><br>
            </div>
				
         </div>
         
      </div>
      
      
   </body>
        <script>
            function changeAmount(){
            var amount=0.00;
            
            amount=Number(document.getElementById("EventType").value)+Number(document.getElementById("Equipment").value)+Number(document.getElementById("VenueName").value) ;
            var inputF = document.getElementById("amt");
            inputF.value = amount;
            var inputText=VenueName.options[VenueName.selectedIndex].text;
            console.log(inputText);
            document.cookie="textVal="+inputText;
            }
        </script>
        
</html>