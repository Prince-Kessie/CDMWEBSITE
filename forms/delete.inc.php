<?php
$link = mysqli_connect("localhost", "root", "", "churchdb");
  
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
$sql = "DELETE FROM registered_members WHERE Member_id='" . $_GET["userid"] . "'";
if(mysqli_query($link, $sql)){
    echo "Record was deleted successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($link);
}
mysqli_close($link);
?>

