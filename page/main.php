<?php
    session_start();
    include("../php/config.php");
    if(isset($_GET["ward"])){
        $ward=$_GET["ward"];
        $_SESSION['ward']=$ward;
        $sql="SELECT * FROM history WHERE ward='".$ward."';";
        $rs=$db->query($sql);
    };
    $n=1;
?>


<!DOCTYPE html>
<html>
    <head> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/function.js"></script>
        <script>
            window.onload=setInterval(check, 1000);
        </script>
        <link rel="stylesheet" type="text/css" href="../css/index.css">     
        <link rel="stylesheet" type="text/css" href="../css/common.css"> 
        <meta charset="utf-8">
        <title>E-mo 病患情緒預警系統</title> 
        </script>
    </head>
    <body >
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
                    <li><a href="./main.php?ward=<?php echo $ward; ?>">病歷管理</a></li>
                    <li><a href="./add_patient.php?ward=<?php echo $ward; ?>&page=patient">新增病患</a></li>
                    <li><a href="../index.php">返回選擇病房</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <table align="center" border=0 id="patient" class="table">
                    <thead>
                        <tr>
                            <th>姓名</th>   
                            <th>出生日期</th>
                            <th>身分證</th>
                            <th>詳細資料</th>
                            <th>目前狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){?>
                            <form action="GET">
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['born'] ?></td>
                            <td><?php echo $row['card'] ?></td>
                            <td><a href="./patient_data.php?ward=<?php echo $ward; ?>&id=<?php echo $row['id']; ?>">詳細資料</a></td>
                            <td style="text-align:center; width:80px;"><div id='warn<?php echo($n); $n+=1; ?>'>未啟用</div></td>
                            <td><button class="btn btn-dark" type="button" onclick="location.href='../php/delete.php?id=<?php echo $row['id']; ?>&page=patient'">刪除</button></td>
                            </tr>
                        <?php } ?>
                        </from>
                    </tbody>
                </table>
            </div>
            <?php 
                }
            ?>
        </div>  
    </body>
</html>

