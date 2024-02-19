<?php
    session_start();
    include("../php/config.php");
    $id=$_SESSION['id'];
    $ward=$_SESSION['ward'];
?>


<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/index.css">     
        <link rel="stylesheet" type="text/css" href="../css/common.css"> 
        <title>E-mo 病患情緒預警系統</title> 
    </head>
    <body>
        <div id="wrapper" class="wrapper">
            <div id="header" class="header">
                <dvi id="title" class="title">
                    <img src="../img/title.png" width="75" heigh="75" alt="標題"></img>
                    E-mo 病患情緒預警系統
                </dvi>
                <div id="login" class="login">        
                    <?php 
                        if(isset($_SESSION['username'])){
                            echo "<a href='../Login/logout.php'> 登出 </a>";
                        }
                        else if(!isset($_SESSION['username'])){
                            echo "<a href='../Login/index.html'> 登入 </a>";
                        }
                    ?>
                </div>
            </div>
            <?php 
                if (!isset($_SESSION['username'])){
                    echo '<hr></hr>';
                    echo('<div id="lo">請先進行登入</div>');
                } 
                else{  
            ?>
            <div id="nav">
                <ul>
                    <li><a href="./diagnosis.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">返回診斷紀錄</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <div id="add" class="add">
                    <form method="POST" action="../php/add.php?page=diagnosis" >
                        <p>登入日期:</p>
                        <input type="date" class="form-control" name="date">
                        <p>藥單紀錄編號:</p>
                        <input type="text" class="form-control" name="drug" placeholder="限制不超過10位數字">
                        <hr>    
                        <input type="submit" value="新增" class="btn btn-dark">
                    </from>
                </div>
            </div>
            <?php 
                }
            ?>   
        </div>      
    </body>  
</html>

