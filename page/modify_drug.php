<?php
session_start();
include("../php/config.php");
$ward=$_SESSION["ward"];
$id=$_SESSION["id"]; 
$drug=$_SESSION['drug'];
$drug_id=$_GET['drug_id'];
?>



<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/function.js"></script>
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
                    <li><a href="./drug.php?ward=<?php echo $ward; ?>&id=<?php echo $id; ?>&drug=<?php echo $drug; ?>">返回藥單紀錄</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <?php 
                    $sql="SELECT * FROM drug WHERE id=".$drug_id.";";
                    $rs=$db->query($sql);
                ?>
                <form method="POST" name="form" action="../php/modify.php?page=drug&drug_id=<?php echo $drug_id;?>">
                    <table id='drug_table' class="table" style="margin:auto;" border="0">
                        <tr>
                            <th scope="col">藥品名稱</th>
                            <th scope="col">用法</th>
                            <th scope="col">服藥方式</th>
                            <th scope="col">劑量</th>
                            <th scope="col">天數</th>
                            <th scope="col">總數</th>
                            <th></th>
                            <th></th>
                        </tr>    
                    <?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr id="drug">
                            <td scope="col"><input id='med' class="form-control" type="text" name="medicine" value="<?php echo $row['medicine'] ?>"></td>
                            <td><input id='use' class="form-control" type="text" name="uses" value="<?php echo $row['uses'] ?>"size=10></td>
                            <td><input id='times' class="form-control" type="text" name="times" value="<?php echo $row['times'] ?>"size=15></td>
                            <td><input id='dose' class="form-control" type="text" name="dose" value="<?php echo $row['dose'] ?>" size=10></td>
                            <td><input id='day' class="form-control" type="text" name="days" value="<?php echo $row['days'] ?>" size=10></td>
                            <td><input id='total' class="form-control" type="text" name="total" value="<?php echo $row['total'] ?>" size=10></td>
                    <?php } ?>    
                            <td><button class="btn btn-dark">確認修改</button></td>        
                        </tr>         
                    </table>
                </form>
            </div>
            <?php
                }
            ?>
        </div>    
    </body>
</html>


