<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "churchdb";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $b = $_POST["b2"];
        $c = $_POST["b3"];
        $d = $_POST["b4"];
        $f = $_POST["b6"];
        $g = $_POST["b7"];
        $h = $_POST["b8"];
        $i = $_POST["b9"];
        $j = $_POST["b10"];
        $k = $_POST["b11"];
        $l = $_POST["b12"];
        

        $query = "INSERT INTO registered_members (Member_id, Firstname, Middle_initial, Lastname, Address, 
        Country, Date_of_birth, Email, Contact, Maritus_status,  Date_of_membership ) 
        VALUES (:a,:b,:c,:d, :f, :g, :h, :i, :j, :k, :l)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':a', $a);
        $statement->bindParam(':b', $b);
        $statement->bindParam(':c', $c);
        $statement->bindParam(':d', $d);
        $statement->bindParam(':f', $f);
        $statement->bindParam(':g', $g);
        $statement->bindParam(':h', $h);
        $statement->bindParam(':i', $i);
        $statement->bindParam(':j', $j);
        $statement->bindParam(':k', $k);
        $statement->bindParam(':l', $l);
        
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>