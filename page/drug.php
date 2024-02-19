<?php 
    session_start();
    include("../php/config.php");
    $id=$_SESSION['id'];
    $ward=$_SESSION['ward'];
    $drug=$_GET['drug'];
    $_SESSION['drug']=$drug;
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.6.1.min.js"></script>
        <meta charset="utf-8">  
        <link rel="stylesheet" type="text/css" href="../css/index.css">     
        <link rel="stylesheet" type="text/css" href="../css/common.css"> 
        <title>E-mo 病患情緒預警系統</title> 
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <dvi id="title">
                    <img src="../img/title.png" width="75" heigh="75" alt="標題"></img>
                    E-mo 病患情緒預警系統
                </dvi>
                <div id="login">        
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
                    <li><a href="./diagnosis.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">返回</a></li>
                    <li><a href="./add_drug.php?page=drug&drug=<?php echo $drug; ?>">新增藥物</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <table  class="table" style="margin:auto;" border="0">
                    <tr>
                        <th scope="col">藥品名稱</th>
                        <th scope="col">用法</th>
                        <th scope="col">服法</th>
                        <th scope="col">劑量</th>
                        <th scope="col">天數</th>
                        <th scope="col">總數</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                        $sql="SELECT * FROM drug WHERE drug='".$drug."';"; 
                        $rs=$db->query($sql);
                        while($row = $rs->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td scope="col"><?php echo $row['medicine'] ?></td>
                        <td><?php echo $row['uses'] ?></td>
                        <td><?php echo $row['times'] ?></td>
                        <td><?php echo $row['dose'] ?></td>
                        <td><?php echo $row['days'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        <td width=100><button class="btn btn-dark" type="button" onclick="location.href='../php/delete.php?page=drug&drug_id=<?php echo $row['id']; ?>'">刪除</button></td>
                        <td width=100><button class="btn btn-dark" type="button" onclick="location.href='./modify_drug.php?page=drug&drug_id=<?php echo $row['id']; ?>'">修改</button></td>
                    <?php
                        }
                    ?>      
                    </tr>    
                </table>
            </div>
        </div> 
    </body>
</html>