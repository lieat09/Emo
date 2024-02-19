<?php
    session_start();
    include('../php/config.php');
    $db = new PDO("mysql:host=127.0.0.1;dbname=hos_db;charset=utf8", "root", "root");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM users WHERE username ='".$username."'";
        $result = $db->query($sql);
        $res=$result->fetchColumn(2);
        
        if($result->rowCount()==1 && $password==$res){
            $_SESSION['username']=$username;
            header("location:../index.php");
        }else{
            echo "<script>alert('帳號或密碼錯誤');
            window.location.href='index.html';
            </script>";
        }
    }
    else{
        echo "<script>alert('Something wrong');
            window.location.href='index.html';
            </script>";
    }



?>

