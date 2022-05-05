<?php
   include('session.php');
   if($_SESSION['Username']=="")
   {
         $message = "Please Login";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location: index.php");
   }
?>
<html">
   
   <head>
      <title>Welcome</title>
   </head>
   <style>
        .menuStyle
        {
            width:100%;
            height:50px;
            background-color:#7DCEA0;

        }
        .hero-image {
         background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("Images/welcome.jpg");
         height: 100%;
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
         a{
            color:white;
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
   <body>
   <div class="hero-image">   
      </br>
      <h5 style="text-align:right;color:white;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
      <br><br><br><br>
      <div class="hero-text">
      <div style = "width:100%; border: solid 1px #00000 ;border-radius: 25px; " align = "left">
      <br><br>  <br><br>  <br><br> 
      <table style="width:100%;">
          <td><button class="menuStyle" onclick="location.href='AddVenue.php'">Add Venue</button></td>
          <td><button class="menuStyle" onclick="location.href='bookStatusAdmin.php'">Booking Status</button></td>
          <td><button class="menuStyle" onclick="location.href='bookingHistoryAdmin.php'">Booking History(Report)</button></td>
      </table>
      </div>
      </div>
      </div>
   </div>
   </body>
   
</html>
