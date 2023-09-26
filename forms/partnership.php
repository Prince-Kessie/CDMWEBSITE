<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "churchdb";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST["id"];
        $fn = $_POST["firstname"];
        $ln = $_POST["lastname"];
       
        $c = $_POST["contact"];
        $email = $_POST["email"];
        $d = $_POST["date"];
        $p = $_POST["ptns"];
        $am = $_POST["amount"];
         $gen = $_POST["gender"];
       
        

        $query = "INSERT INTO partnership (Donor_id, Firstname, Lastname,  Contact, Email, Date_of_ptns, Ptns_type, Amount, Gender) 
        VALUES (:id,:fn,:ln,:c,:email,:d,:p,:am,:gen)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':fn', $fn);
        $statement->bindParam(':ln', $ln);
       
        $statement->bindParam(':c', $c);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':d', $d);
        $statement->bindParam(':p', $p);
        $statement->bindParam(':am', $am);
         $statement->bindParam(':gen', $gen);
       
       
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>