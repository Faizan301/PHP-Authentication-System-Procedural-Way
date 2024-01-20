<?php
session_start();
require ("config.php");

if (isset($_POST["login"])) 
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email == '' || $password == '')
    {
        echo 'please fill all the information';
    }
    else
    {
        $select = "SELECT * FROM `auth_register` WHERE `email` = '".$email."' ";
        $res = mysqli_query($conn, $select);
        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_array($res);
            if(password_verify($password, $row["password"]))
            {
                echo "<script>alert('Login In')</script>";
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header('Location: index.php');
            }
            else
            {
                echo "<script>alert('Password doesnot match'); window.location='login.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('invalid credential'); window.location='login.php';</script>";
        }
    }
}

?>