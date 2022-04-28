<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST["Name"];
      $mypassword = $_POST["Password"]; 
      $myaddress=$_POST["Address"];
      $myMonile=$_POST["Mobile"];
      $myEmail=$_POST["Email"];

      
      $sql = "INSERT INTO Customer(name,addr,mob,email,pass) VALUES('$myusername','$myaddress','$myMonile','$myEmail','$mypassword')";
      if ($db->query($sql) === TRUE) {
         $message = "Venue Inserted";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: index.php"); 
      }
        
      else {
         $error = "Your Login Name or Password is invalid";
      
   }
}
?>
<html>
   
   <head>
      <title>Register</title>
      
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
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border-color:#CCD1D1;
            width:100%;
            }

            input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
            }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	<br><br>
      <div  align = "left" >
         <div style = "width:100%; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
            <div style = "background-color:#F5B041; color:#FFFFFF;height:30px; padding:3px;margin-top:5px;border-radius: 5px;text-align:center;"><b>Register</b></div>
				
            <div style = "margin:10px">
               
                <form  action = "" method = "post">
                
                <label for="Name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="Name" id="Name" required>

                <label for="Address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="Address" id="Address" required>

                <label for="Mobile"><b>Mobile</b></label>
                <input type="text" placeholder="Enter Mobile" name="Mobile" id="Mobile" required>

                <label for="Email"><b>Email</b></label>
                <input type="Email" placeholder="Enter Email" name="Email" id="Email" required>

                <label for="Password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="Password" id="Password" required>

                <button style="background-color:#5DADE2; border-radius:2px;color:white;float: left;width:100px;height:40px;" type="submit" name="submit" class="btn btn-primary btn-block btn-large">Register</button>
                
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
               <br><br>
               <h5  style="text-align:right;"><a href="index.php">Already a user? Login</a></h5>	
            </div>
				
         </div>
         
      </div>

   </body>
</html>