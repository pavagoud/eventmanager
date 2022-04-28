<?php
include("config.php");
$id=$_GET['id'];
$sql = "DELETE FROM venue WHERE Id='$id'";

if ($db->query($sql) === TRUE) {
    $message = "Venue Deleted";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: AddVenue.php"); 
} else {
    $message = "Venue Not Deleted";
    echo "<script type='text/javascript'>alert('$message');</script>";
  header("Location: AddVenue.php"); 
}
?>