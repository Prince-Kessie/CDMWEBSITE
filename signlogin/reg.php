<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "churchdb";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $n = $_POST["username"];
        $email = $_POST["email"];
        $c = $_POST["password"];
         $r = $_POST["role"];
        

        $query = "INSERT INTO register (Username, Email, Password, Role) VALUES (:n,:email,:c, :r)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':n', $n);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':c', $c);
        $statement->bindParam(':r', $r);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>