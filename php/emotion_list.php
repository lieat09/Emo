<?php
    session_start();
    include("../php/config.php");
    $id=$_SESSION['id'];
    $ward=$_SESSION["ward"];
    $sql="SELECT * FROM emotion_data";
    $rs=$db->query($sql.' LIMIT 10 ');   
    while($row = $rs->fetch(PDO::FETCH_ASSOC)){ 
        $emo_time=$row['emo_time'];
        $emo_type=$row['emo_type'];
        echo ("
            <tr>
                <td>$emo_time</td>
                <td>$emo_type</td>                     
            </tr>");
                        
    }
?>