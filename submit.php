<?php

    require_once('connection.php');

    $name=$_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    mysqli_query($con,"insert into test(name,username,email,mobile,password) values ('$name','$username','$email','$mobile','$password')" );
    echo "insert";


?>