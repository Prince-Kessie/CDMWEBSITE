<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "churchdb";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $n = $_POST["b1"];
        $e = $_POST["b2"];
        $c = $_POST["b3"];
        $p = $_POST["b4"];
        $r = $_POST["b5"];
        $y = $_POST["b6"];
        $z = $_POST["b7"];
        

        $query = "INSERT INTO employee_info (Person_id, Firstname, Middle_initial, Lastname, Gender, Salary, DateEmployed ) 
        VALUES (:n,:e,:c,:p, :r, :y, :z)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':n', $n);
        $statement->bindParam(':e', $e);
        $statement->bindParam(':c', $c);
        $statement->bindParam(':p', $p);
        $statement->bindParam(':r', $r);
        $statement->bindParam(':y', $y);
        $statement->bindParam(':z', $z);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>