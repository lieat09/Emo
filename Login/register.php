<?php 
$db = new PDO("mysql:host=127.0.0.1;dbname=hos_db;charset=utf8", "root", "root");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check1="SELECT * FROM users WHERE username='".$username."'";
    $check2 = $db->query($check1);
    if($check2->rowCount()==0){
        $sql="INSERT INTO users (username, password)
            VALUES('".$username."','".$password."')";
        if($db->query($sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='../index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3;url=index.html");
            exit;
        }else{
            echo "Error creating table: " . $db->errorInfo();
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header("refresh:3;url=register.html",true);
        exit;
    }
}

$db=NULL;


function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} 




?>