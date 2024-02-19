
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
    include("./config.php");
    $emo_0=0;
    $emo_1=0;
    $emo_2=0;
    $emo_3=0;
    $emo_4=0;
    $emo_5=0;
    $emo_6=0;
    $sql="SELECT * FROM emotion_data";
    $rs=$db->query($sql); 
    $data_total = $rs -> rowCount();
    $begin=$data_total-9;
    
    if ($begin <= 0){
        $begin = 0;
        $sql="SELECT * FROM emotion_data LIMIT " .$begin. ",".$data_total.";";
        $rs=$db->query($sql); 
        while($row = $rs->fetch(PDO::FETCH_ASSOC)){
            $emo_type=$row['emo_type'];
            if ($emo_type == 'angry'){
                $emo_0+=1;
            }
            else if ($emo_type == 'disgust'){
                $emo_1+=1;
            }
            else if ($emo_type == 'fear'){
                $emo_2+=1;
            }
            else if ($emo_type == 'happy'){
                $emo_3+=1;
            }
            else if ($emo_type == 'sad'){
                $emo_4+=1;
            }
            else if ($emo_type == 'surprise'){
                $emo_5+=1;
            }
            else if ($emo_type == 'neutral'){
                $emo_6+=1;
            }
        }
    }
    else{
        $sql="SELECT * FROM emotion_data LIMIT ".$begin.",9;";
        $rs=$db->query($sql); 
        while($row = $rs->fetch(PDO::FETCH_ASSOC)){
            $emo_type=$row['emo_type'];
            if ($emo_type == 'angry'){
                $emo_0+=1;
            }
            else if ($emo_type == 'disgust'){
                $emo_1+=1;
            }
            else if ($emo_type == 'fear'){
                $emo_2+=1;
            }
            else if ($emo_type == 'happy'){
                $emo_3+=1;
            }
            else if ($emo_type == 'sad'){
                $emo_4+=1;
            }
            else if ($emo_type == 'surprise'){
                $emo_5+=1;
            }
            else if ($emo_type == 'neutral'){
                $emo_6+=1;
            } 
        }        
    }
    $max=$emo_0;
    $emo=0; //1是負面 0是正面
    $status =1;
    if ($max < $emo_1){
        $max = $emo_1;
        $status =1;
        $emo = 1;
    }
    if ($max < $emo_2){
        $max = $emo_2;
        $status =1;
        $emo = 2;
    }
    if ($max < $emo_3){
        $max = $emo_3;
        $status =0;
        $emo = 3;
    }
    if ($max < $emo_4){
        $max = $emo_4;
        $status =1;
        $emo = 4;
    }
    if ($max < $emo_5){
        $max = $emo_5;
        $status =0;
        $emo = 5;
    }
    if ($max < $emo_6){
        $max = $emo_6;
        $status =0;
        $emo = 6;
    }

    
    if ($emo==0){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('angry',".$status.")";
        $db->query($sql);
    }
    else if ($emo==1){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('disgust',".$status.")";
        $db->query($sql);
    }
    else if ($emo==2){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('fear',".$status.")";
        $db->query($sql);
    }
    else if ($emo==3){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('happy',".$status.")";
        $db->query($sql);
    }
    else if ($emo==4){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('sad',".$status.")";
        $db->query($sql);
    }
    else if ($emo==5){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('surprise',".$status.")";
        $db->query($sql);
    }
    else if ($emo==6){
        $sql = "INSERT INTO emotion_data_2 (emo_type,status) VALUES('neutral',".$status.")";
        $db->query($sql);
    }
    $sql = "DELETE FROM emotion_data_2 LIMIT 1";
    $db->query($sql); 
?>


