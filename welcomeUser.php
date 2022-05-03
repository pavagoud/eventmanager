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
    </style>
   <body>
      <h1 style="text-align:Center;">Welcome</h1>
      <h5 style="text-align:right;"> <?php echo $_SESSION['Username']; ?><a href = "logout.php">  (Sign Out)</a></h5>
      <br><br><br><br><br><br>
      <table style="width:100%;">
          <td><button class="menuStyle" onclick="location.href='bookEvent.php'">Book Event</button></td>
          <td><button class="menuStyle" onclick="location.href='bookStatus.php'">Booking Status</button></td>
          <td><button class="menuStyle" onclick="location.href='viewVenus.php'">View Venus</button></td>
          <td><button class="menuStyle" onclick="location.href='logout.php'">Exit</button></td>
      </table>
      
   </body>
   
</html>
