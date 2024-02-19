<?php
include("./config.php");
session_start();

if(isset($_GET)){
    $page=$_GET['page'];
    if($page=='patient'){
        if(!empty($_POST)){
            $ward=$_SESSION['ward'];
            $name=$_POST['name'];
            $card=$_POST['card'];
            $born=$_POST['born'];
            $special=$_POST['special'];
            $ward=$_POST['ward'];
            $sick=$_POST['sick'];
            $allergy=$_POST['allergy'];
            $sql="INSERT INTO history(name,card,born,sick,allergy,special,ward) VALUES('" .$name. "','" .$card. "','" .$born. "','" .$sick. "','" .$allergy. "','" .$special. "','" .$ward. "')";
            $db->query($sql);
            header("location:../page/main.php?ward=".$ward);
            
        }

    }

    if($page=='diagnosis'){ 
        $ward=$_SESSION['ward'];
        $id=$_SESSION['id'];
        $date=$_POST['date'];
        $drug=$_POST['drug'];
        $_SESSION['drug']=$drug;

        $sql="INSERT INTO diagnosis(drug,date,pid) VALUES('".$drug."','".$date."','".$id."');";
        $db->query($sql);
        header("Location:../page/diagnosis.php?ward=".$ward."&id=".$id);

    
    }

    if($page == 'drug'){
        $ward=$_SESSION['ward'];
        $id=$_SESSION['id'];
        $drug=$_SESSION['drug'];
        $med="'".$_POST['medicine']."'";
        $uses="'".$_POST['uses']."'";
        $times="'".$_POST['times']."'";
        $dose="'".$_POST['dose']."'";
        $days="'".$_POST['days']."'";
        $total="'".$_POST['total']."'";
        $sql="INSERT INTO drug(drug,medicine,uses,times,dose,days,total) VALUES(".$drug.",".$med.",".$uses.",".$times.",".$dose.",".$days.",".$total.");";
        $db->query($sql);
        header("Location:../page/drug.php?ward=".$ward."&id=".$id."&drug=".$drug);
    }

}



?>


