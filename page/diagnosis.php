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
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
                    <li><a href="./add_diagnosis.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">新增診斷紀錄</a></li>
                    <li><a href="./main.php?ward=<?php echo $ward; ?>">返回</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <table class="table" style="margin:auto;" border="0">
                    <tr>
                        <th scope="col">藥單編號</th>
                        <th scope="col">回診日期</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    <?php 
                        $sql="SELECT * FROM diagnosis WHERE pid='".$id."';";
                        $rs=$db->query($sql);
                        while($r = $rs->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $r['drug'] ?></td>
                        <td><?php echo $r['date'] ?></td>
                        <td><a href="./drug.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>&drug=<?php echo $r['drug']; ?>" >藥單紀錄</a></td>
                        <td><button class="btn btn-dark" type="button" onclick="location.href='../php/delete.php?drug=<?php echo $r['drug']; ?>&page=diagnosis'">刪除</button></td>
                    </tr>
                    <?php }?>
                </table> 
            </div>
        </div>
    </body>
</html>