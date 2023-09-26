
<?php
 session_start();
 $con = mysqli_connect("localhost", "root", "", "churchdb");

 if(isset($_post['update']))
 {

  $b1 = $_post['b1'];
  $b2 = $_post['b2'];
  $b3 = $_post['b3'];
  $b4 = $_post['b4'];
  $b5 = $_post['b5'];
  $b6 = $_post['b6'];
  $b7 = $_post['b7'];
  $b8 = $_post['b8'];
  $b9 = $_post['b9'];
  $b10 = $_post['b10'];
  $b11 = $_post['b11'];
 

  $query = "UPDATE registered_members SET Firstname='$b2', Middle_initial='$b3', Lastname='$b4', 
  Address='$b5', Country='$b6', Date_of_birth='$b7', Email='$b8', Contact='$b9', Maritus_status='$b10', 
  Date_of_membership='$b11' WHERE Member_id='$b1'";

  $query_run = mysqli_query($con, $query);

  if( $query_run)
  {
    $SESSION['status'] = "Data updated successfully";
    header("Location: myupdate.php");
  }
  else 
  {
    $SESSION['status'] = "Data not updated";
    header("Location: myupdate.php");
  }
 }
?>