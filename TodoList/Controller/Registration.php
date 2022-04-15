<?php
session_start(); 
include "../Database/Database.php";

if (isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    
    
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: ../View/Registration.html");
        exit();
    }else{
        $sql = " INSERT INTO `user`(`email`, `Password`, `name`) VALUES ('$email','$password','$name') ";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../View/Login.html");
             exit();
        }else{
            header("Location: ../View/Registration.html");
            exit();
        }

    }
}


?>