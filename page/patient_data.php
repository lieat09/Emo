<?php 
    session_start();
    include("../php/config.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $_SESSION['id']=$id;
    };
    $ward=$_SESSION['ward'];
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
            <div id="nav" class="nav">
                <ul>
                    <li><a href="./patient_data.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>">病歷管理</a></li>
                    <li><a href="./emotion_list.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>" >情緒紀錄</a></li>
                    <li><a href="./diagnosis.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>" >診斷紀錄</a></li>
                    <li><a href="./main.php?ward=<?php echo $ward; ?>">返回</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <?php 
                    $sql="SELECT * FROM history WHERE id='".$id."';";
                    $rs=$db->query($sql);
                    $row = $rs->fetch(PDO::FETCH_ASSOC);
                ?>
                <table style="margin:auto; width:640px; height:480px;" border="0" class="table">
                    <tr>
                        <th colspan="2">詳細病歷</th>
                    </tr>
                    <tr>
                        <th style="width:120px;">姓名:</th>
                        <td style="text-align:center;"><?php echo $row['name'] ?></td>
                    </tr>
                    <tr>
                        <th>身分證字號:</th>
                        <td style="text-align:center;"><?php echo $row['card'] ?></td>
                    </tr>
                    <tr>
                        <th>出生日期:</th>
                        <td style="text-align:center;"><?php echo $row['born'] ?></td>
                    </tr>
                    <tr>
                        <th>病史:</th>
                        <td style="text-align:center;"><?php echo $row['sick'] ?></td>
                    </tr>
                    <tr>
                        <th>過敏藥物:</th>
                        <td style="text-align:center;"><?php echo $row['allergy'] ?></td>
                    </tr>
                    <tr>
                        <th>特別注意事項:</th>
                        <td style="text-align:center;"><?php echo $row['special'] ?></td>
                    </tr>
                    <tr>
                        <th>登入日期:</th>
                        <td style="text-align:center;"><?php echo $row['first'] ?></td>
                    </tr>
                    <tr>
                        <th>病房號碼:</th>
                        <td style="text-align:center;"><?php echo $row['ward'] ?></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td id='patient_mod'><button class="btn btn-dark" type="button" onclick="location.href='./modify_patient.php?id=<?php echo $row['id']; ?>&page=patient'">修改資料</button></td>
                    </tr>               
                </table>
                <?php 
                    } 
                ?>
            </div>
        </div>
    </body>
</html>