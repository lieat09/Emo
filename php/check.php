<style>
#warn_sign_red{
    width:50px;
    height:50px;
    background-color:red;
    border-radius:50%;
    text-align: center;
    vertical-align: middle;
}
#warn_sign_green{
    width:50px;
    height:50px;
    background-color:green;
    border-radius:50%;
    text-align: center;
    vertical-align: middle;
}
</style>

<?php
    session_start();
    include('./config.php');
    $sql="SELECT * FROM emotion_data_2 ORDER BY emo_time DESC Limit 3 ";
    $rs=$db->query($sql); 
    $warn=0;

    while($row = $rs->fetch(PDO::FETCH_ASSOC)){
        if (isset($row['status'])){
            $emo_type=$row['status'];
            if ($emo_type == 0){
                $warn=0;  
            }
            else if ($emo_type == 1){
                $warn+=1;                    
            }
        }
        else {
            $warn = 111;
        }
        
    }        
    


    if ($warn >= 3){
        echo "<img src='../img/bad.png' width='50' height='50' onclick='open_win()'>";
        
    }
    else if($warn < 3){      
        echo "<img src='../img/good.png' width='50' height='50'>";  
       
    }
    else if($warn==111){
        echo '未啟用';
        
    }
?>

