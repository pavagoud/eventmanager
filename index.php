<?php
   session_start();
   include("config.php");
    //Establishing connection with our database
   $error = ""; //Variable for storing our errors.
   
   if (isset($_POST["submit"])) {
       if (empty($_POST["email"]) || empty($_POST["password"])) {
        $message = "Fields cannot be empty";
        echo "<script type='text/javascript'>alert('$message');</script>";
       } else {
           // Define $nic and $password
           $email = $_POST['email'];
           $password = $_POST['password'];
           $UserType=$_POST['UserType'];
          
   
         if($UserType=="User")
         {
           //Check nic and password from database
           $sql = "SELECT Id,name FROM customer WHERE email='$email' and pass='$password' ";
           $result = mysqli_query($db, $sql);
           if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $userId=$row['Id'];
            $username=$row['name'];
           
   
           
               $_SESSION['Username'] = $username; // Initializing Session
               $_SESSION['Id']=$userId;
               header("Location: welcomeUser.php"); 
               //echo "i am here";
                
           }
           else
           {
            $message = "Invalid Details";
            echo "<script type='text/javascript'>alert('$message');</script>";
           }
         
         }
         else
         {
            if($email=="admin@gmail.com" && $password=="Admin")
            {
               $_SESSION['Username'] = "Admin"; // Initializing Session
               $message = "Login Successful";
               echo "<script type='text/javascript'>alert('$message');</script>";
               header("Location: welcome.php");
            }
         }
      
       }
 }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
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
         input[type=text],input[type=password]
         {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border-color:#CCD1D1;
            height:20px;
         }
         body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      }

      .hero-image {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("Images/login.jpeg");
      height: 50%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      }

      .hero-text {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      }

      .hero-text button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 10px 25px;
      color: black;
      background-color: #ddd;
      text-align: center;
      cursor: pointer;
      }

      .hero-text button:hover {
      background-color: #555;
      color: white;
      }
         
        
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
          <br><br><br><br>
          <div class="hero-image">
      <div class="hero-text">
      </div>
      </div>
          <div style = "width:300px; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
            <div style = "background-color:#F5B041; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>User Type  :</label><br><br>
                  <select name="UserType" id="UserType" style="width:100%;height:30px;">
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                  </select><br><br>
                  <label>Email  :</label><input type = "text" name = "email" class = "box"/><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/>
                  <button style="background-color:#5DADE2; border-radius:2px;color:white;float: right;" type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px;"></div>
               <h5><a href="Register.php">Create Account?</a></h5>
               <br>
            </div>
				
         </div>
			
      </div>

   </body>
</html>