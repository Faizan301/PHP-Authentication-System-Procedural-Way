<?php

require ("config.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT); 

    if($name == "" || $email == "" || $phone == "" || $password == "")
    {
        echo "please fill all the information";
    }
    else
    {
        $sql = "INSERT INTO `auth_register` (`name`, `email`, `phone`,`password`) VALUES ('".$name."','".$email."','".$phone."','".$hash."')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            echo "Inserted Success";
            header("Location: login.php");
        }
        else
        {
            echo "Failed";
        }
    }
}

?>