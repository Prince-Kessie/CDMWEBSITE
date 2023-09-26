<?php
if (isset($_POST['login'])) {
    loginFunction();
}

function loginFunction(){
    error_reporting(-1);
// Database connection
$db = new mysqli("localhost", "root", "", "churchdb");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to check user credentials
$query = "SELECT * FROM register WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($db, $query);
$res = $result->fetch_object();

if ($result->num_rows > 0) {
    $role = $res->Role;
    $username = $res->Username;

      if ($role == 'Specialized Admin') {   
    // Successful login
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $filePath = '../index.html';
    header("Location:  $filePath"); // Redirect to a dashboard or homepage.
    }

        elseif ($role == 'Head Admin') {
        // echo 'Welecome back '.$role;    
        // # code...
        // Successful login
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $filePath = '../admin/index.php';
    header("Location:  $filePath"); // Redirect to a dashboard or homepage.
    }

    elseif ($role == 'Assistant Admin') {
       // Successful login
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $filePath = '../dashboard-main.html';
    header("Location:  $filePath"); // Redirect to a dashboard or homepage.
    }

    if ($role == 'Pastor') {   
    // Successful login
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $filePath = '../pastor/index.php';
    header("Location:  $filePath"); // Redirect to a dashboard or homepage.
    }


    elseif ($role == 'Choir Leader') {
      session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $filePath = '../dashboard-main.html';
    header("Location:  $filePath"); // Redirect to a dashboard or homepage.
    }
} 
else {
    // Failed login
    echo "Invalid username or password. <a href='login.php'>Try again</a>";
}
$db->close();

}







?>
