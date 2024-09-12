<?php
$username  = $_POST['username'];
$password = $_POST['password'];

// Database Connection Here
$con = new mysqli("172.17.0.2","root","root","loginauth");
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
            header("Location:intro.html");
        }
        else {
            echo '<script>
            window.location.href = "index.html";
            alert("login failed. Invalid username or password")
            </script>';
        }
    } 
    
    else {
            echo '<script>
            window.location.href = "index.html";
            alert("login failed. Invalid username or password")
            </script>';
        }

     
    
}    

?>
