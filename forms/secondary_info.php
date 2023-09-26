
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
        $f = $_POST["b5"];
        $h = $_POST["b6"];
        $i = $_POST["b7"];
        $j = $_POST["b8"];
        $k = $_POST["b9"];
        $l = $_POST["b10"];
       
       
      
        

        $query = "INSERT INTO secondary_info (Member_id, Fullname, Gender, Fathername, Mothername, Relative,
         Place_of_birth, Hometown, Edu_id, Parent_id) 
        VALUES (:a,:b,:c,:d, :f,:h, :i, :j, :k, :l)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':a', $a);
        $statement->bindParam(':b', $b);
        $statement->bindParam(':c', $c);
        $statement->bindParam(':d', $d);
        $statement->bindParam(':f', $f);
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