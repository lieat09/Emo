<?php
    session_start();
    include("../php/config.php");
    $ward=$_SESSION['ward'];
    $page=$_GET['page'];
    
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
                    <li><a href="./main.php?ward=<?php echo $ward; ?>">返回</a></li>
                </ul>
            </div>
            <hr></hr>
            <div id="content">
                <div id="add" class="add" >
                    <form method="POST" name="form" action="../php/add.php?page=patient" >
                        <table style="margin:auto; width:500px; height:480px;"  class="table">
                            <tr>
                                <th style="width:120px;">姓名:</th>
                                <td><input type="text" class="form-control" name="name" placeholder="請輸入姓名"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">身分證:</th>
                                <td><input type="text" class="form-control" name="card" placeholder="例如:L123456789"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">出生年月日:</th>
                                <td><input type="date" class="form-control" name="born" value="<?php echo $row['born'] ?>"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">過去疾病:</th>
                                <td><input type="text" class="form-control" name="sick" placeholder="例如:心臟病、高血壓"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">藥物過敏:</th>
                                <td><input type="text" class="form-control" name="allergy" placeholder="例如:xxx"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">特別事項:</th>
                                <td><input type="text" class="form-control" name="special" placeholder="例如:吸菸、喝酒"></td>
                            </tr>
                            <tr>
                                <th style="width:120px;">病房號碼:</th>
                                <td>
                                    <select name='ward' class="form-select" >
                                        <?php 
                                            $sel_ward="SELECT * FROM ward";
                                            $rs_ward=$db->query($sel_ward);
                                            while($row_ward = $rs_ward->fetch(PDO::FETCH_ASSOC)){?>
                                            <option name='ward' value="<?php echo($row_ward['ward']); ?>"><?php echo($row_ward['ward']); ?>
                                            </option>
                                        <?php } ?>
                                    </select>    
                                </td>    
                            </tr>
                            <tr>
                                <th></th>
                                <td id='patient_mod'><input type="submit" value="新增" class="btn btn-dark"></button></td>
                            </tr>
                        </table>  
                    </from>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </body>   
</html>

