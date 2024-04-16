<?php
    $error='';
    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty($_POST['password'])){
    $error="Username or Password is Invalid";
    }
    else
    {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quilet";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM login WHERE password='$password' AND username='$username'");
    $rows = mysqli_num_rows($query);

    if($rows==1){
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;
    header('Location:/page/home.html');
    }

    else {
        echo "<script>alert('Invalid username and password, try again.')</script>";
    }
    mysqli_close($conn);
    }
    }
?>