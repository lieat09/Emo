<?php
session_start();

include('./config.php');
$page=$_GET['page'];
if ($page == 'patient'){
    $ward=$_SESSION['ward'];
    $id = $_GET['id'];
    $sql = "DELETE FROM history WHERE id='".$id."';";
    $db->query($sql);
    header('location:../page/main.php?ward='.$ward);
}
else if ($page == 'diagnosis'){
    $ward=$_SESSION['ward'];
    $id = $_SESSION['id'];
    $drug = $_GET['drug'];
    $sql = "DELETE FROM diagnosis WHERE drug='".$drug."';";
    $db->query($sql);
    $sql = "DELETE FROM drug WHERE drug='".$drug."';";
    $db->query($sql);
    header('location:../page/diagnosis.php?ward='.$ward.'$id='.$id);
}
else if ($page == 'drug'){
    $ward=$_SESSION['ward'];
    $id = $_SESSION['id'];
    $drug = $_SESSION['drug'];
    $drug_id = $_GET['drug_id'];
    $sql = "DELETE FROM drug WHERE id='".$drug_id."';";
    $db->query($sql);
    header('location:../page/drug.php?ward='.$ward.'&id='.$id.'&drug='.$drug);
}


?>