<?php
$username  = $_POST['username'];
$password = $_POST['password'];

// Database Connection Here
$con = new mysqli("localhost","root","loka@5652","loginauth");
if($con->connect_error){
    die("Failed to conenct : ".$con-connect_error);
} else {
    $stmt = $con->prepare("select * from login where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>Login Successful</h2>";
        }else {
            echo "<h2>Invalid Username or Password</h2>";
        }

    }else {
        echo "<h2>Invalid Username or Password</h2>";
    }
}    

?>