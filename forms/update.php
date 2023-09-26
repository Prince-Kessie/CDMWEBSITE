<?php

$Member_id = $_POST["stud_id"];
$Firstname= $_POST["Firstname"];
$Middle_initial = $_POST["Middle_initial"];
$Lastname = $_POST["Lastname"];
$Address = $_POST["Address"];
$Country = $_POST["Country"];
$Date_of_birth = $_POST["Date_of_birth"];
$Email= $_POST["Email"];
$Contact = $_POST["Contact"];
$Maritus_status = $_POST["Maritus_status"];
$Date_of_membership = $_POST["Date_of_membership"];

$servername = "localhost";
$username = "root";
$password = "";
$db = "churchdb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update registered_members set Firstname='$Firstname', Middle_initial='$Middle_initial', 
Lastname='$Lastname', Address='$Address', Country='$Country', Date_of_birth='$Date_of_birth ', 
 Email='$Email', Contact='$Contact', Maritus_status='$Maritus_status', Date_of_membership=' $Date_of_membership' where Member_id='$Member_id'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>