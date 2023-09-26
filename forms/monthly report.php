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
        $j = $_POST["b10"];
        $k = $_POST["b11"];
        $l = $_POST["b12"];
        $m = $_POST["b13"];
       
        

        $query = "INSERT INTO monthly_report (Report_id, Total_members, Total_visitors, Total_men, Total_women, 
         Total_youth, Total_children, Total_leaders, Total_ministers, Total_employees, Total_assets, Total_pledges, Pledges_fulfilled) 
        VALUES (:a,:b,:c,:d, :e, :f, :g, :h, :i, :j, :k, :l, :m)";
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
        $statement->bindParam(':j', $j);
        $statement->bindParam(':k', $k);
        $statement->bindParam(':l', $l);
        $statement->bindParam(':m', $m);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>