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
      <title>Welcome </title>
   </head>
    <style>
        .menuStyle
        {
            width:100%;
            height:50px;
            background-color:#7DCEA0;

        }
      body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      }

      .hero-image {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("Images/venue.jpeg");
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
   <body>
      <h1 style="text-align:Center;">Welcome</h1>
      <h5 style="text-align:right;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
      <br><br><br><br><br><br>
      <div class="hero-image">
      <div class="hero-text">
         <h1 style="font-size:50px">Welcome!</h1>
         <p>Book Your Venue</p>
      </div>
      </div>
      <table style="width:100%;">
          <td><button class="menuStyle" onclick="location.href='bookEvent.php'">Book Event</button></td>
          <td><button class="menuStyle" onclick="location.href='bookStatus.php'">Booking Status</button></td>
          <td><button class="menuStyle" onclick="location.href='viewVenus.php'">View Venus</button></td>
          <td><button class="menuStyle" onclick="location.href='logout.php'">Exit</button></td>
      </table>
      
   </body>
   
</html>
