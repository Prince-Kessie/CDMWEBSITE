<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "churchdb";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $a = $_POST["b1"];
        $b = $_POST["b2"];
        $c = $_POST["b3"];
        $d = $_POST["b4"];
        $e = $_POST["b5"];
        $f = $_POST["b6"];
        $g = $_POST["b7"];
        $h = $_POST["b8"];
        $i = $_POST["b9"];
       
        

        $query = "INSERT INTO income_yearly_report (Giving_id, Total_offerings, Total_tithes, Mission_offerings,  
         Partnership, Donation, GroundTotal, TotalExpenditure, AccountBalance) 
        VALUES (:a,:b,:c,:d, :e, :f, :g, :h, :i)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':a', $a);
        $statement->bindParam(':b', $b);
        $statement->bindParam(':c', $c);
        $statement->bindParam(':d', $d);
        $statement->bindParam(':e', $e);
        $statement->bindParam(':f', $f);
        $statement->bindParam(':g', $g);
        $statement->bindParam(':h', $h);
        $statement->bindParam(':i', $i);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>