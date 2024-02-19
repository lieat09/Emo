<?php
    session_start();
    include("../php/config.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql="SELECT * FROM history WHERE id='".$id."';";
        $rs=$db->query($sql);
        $row = $rs->fetch(PDO::FETCH_ASSOC);
    };
    if(isset($_GET["ward"])){
        $ward=$_GET["ward"];
        $sql="SELECT * FROM emotion_data_2";
        $rs=$db->query($sql.' LIMIT 10 '); 
    };
?>


<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/webcam.js"></script>
        <script src="../js/function.js"></script>
        <script>
            window.onload=setInterval(warn, 1000);
        </script>
        <link rel="stylesheet" type="text/css" href="../css/index.css">     
        <link rel="stylesheet" type="text/css" href="../css/common.css"> 
        <title>E-mo 病患情緒預警系統</title> 
    </head>
    <body>
        <div>
            <div id="my_camera" style="width:500px; height:500px;"></div>               
        </div> 
    </body>
</html>


<script language="JavaScript">
     Webcam.attach( '#my_camera' );
</script>