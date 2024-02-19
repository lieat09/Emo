<?php
    session_start();
    include("./php/config.php");   
    $sql = "SELECT * FROM ward";
    $rs=$db->query($sql);
?>


<!DOCTYPE html>
<html>
    <head> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="./js/jquery-3.6.1.min.js"></script>
        <script src="./js/function.js"></script>
        <meta charset="utf-8">  
        <link rel="stylesheet" type="text/css" href="./css/index.css">     
        <link rel="stylesheet" type="text/css" href="./css/common.css"> 
        <title>E-mo 病患情緒預警系統</title> 
    </head>
    <body>
        <div id="wrapper" class="wrapper">
            <div id="header" class="header">
                <dvi id="title" class="title">
                    <img src="./img/title.png" width="75" heigh="75" alt="標提"></img>
                    E-mo 病患情緒預警系統
                </dvi>
                <div id="login" class="login">
          
                    <?php 
                        if(isset($_SESSION['username'])){
                            echo "<a href='./Login/logout.php'> 登出 </a>";
                        }
                        else if(!isset($_SESSION['username'])){
                            echo "<a href='./Login/index.html'> 登入 </a>";
                        }
                    ?>
                </div>
            </div>

            <hr></hr>
            <?php 
                if (!isset($_SESSION['username'])){
                    echo('<div id="lo">請先進行登入</div>');
                } 
                else{  
            ?>
            <div id="content">
            <div id="ward" class="ward">
                <form action="GET">
                    <table align="center" border=0 class="table">
                        <thead>
                            <tr>請選擇病房</tr>
                            <tr>
                                <th>病房號碼</th>
                                <th>查看</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){
                                $ward=$row['ward'];?>
                                <tr>
                                    <td><?php echo $row['ward']; ?></td>
                                    <td><a href="./page/main.php?ward=<?php echo $ward; ?>" onclick="open_win_index()">連結</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <?php } ?>
            </div>
        </div>
        

        
    </body>

</html>

