<?php
    session_start();
    include("../php/config.php");
    $id=$_SESSION['id'];
    $ward=$_SESSION["ward"];
    $sql="SELECT * FROM emotion_data";
    $rs=$db->query($sql.' LIMIT 10 '); 

?>


<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/function.js"></script>
        <script>
            window.onload=setInterval(emotion_list, 5000);
        </script>
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
            
            <div id="nav">
                <ul>
                    <li><a href="./patient_data.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">病歷管理</a></li>
                    <li><a href="./emotion_list.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">情緒紀錄</a></li>
                    <li><a href="./diagnosis.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">診斷紀錄</a></li>
                    <li><a href="./main.php?ward=<?php echo $ward; ?>">返回</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <div id="emotion" class="emotion">
                    <table align="center" id="emotion" class="table table-sm table-bordered " width="300px" height="480px">
                        <thead>
                            <tr>
                                <!--<th>預覽</th>-->
                                <th >紀錄時間</th>
                                <th >情緒</th>
                            </tr>
                        </thead>
                        <tbody id="emotion_list">
                            <?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){?>
                            <form method="GET">    
                            <tr>
                                <td><?php echo $row['emo_time'] ?></td>
                                <td><?php echo $row['emo_type'] ?></td>                     
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        

        
    </body>

</html>

