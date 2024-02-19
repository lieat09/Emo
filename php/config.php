<?php
$dbms='mysql';     
$host='localhost';
$dbName='hos_db'; 
$user='root';   
$pass='root';    
$dsn="$dbms:host=$host;dbname=$dbName";


try {
    $db = new PDO($dsn, $user, $pass);

} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}


?>