<?php
session_start();
$ward=$_SESSION['ward'];
include('./config.php');
$page=$_GET['page'];
if ($page == 'patient'){
    $id=$_SESSION['id'];
    $name=$_POST['name'];
    $card=$_POST['card'];
    $born=$_POST['born'];
    $sick=$_POST['sick'];
    $sel_ward=$_POST['ward'];
    $allergy=$_POST['allergy'];
    $special=$_POST['special'];
    $sql ="UPDATE history SET name='".$name."',card='".$card."',born='".$born."',sick='".$sick."',allergy='".$allergy."',special='".$special."',ward='".$sel_ward."' WHERE id=".$id.";";
    $db->query($sql);
    header('location:../page/main.php?ward='.$ward);
}
else if($page =='drug'){
    $id=$_SESSION['id'];
    $drug=$_SESSION['drug'];
    $drug_id=$_GET['drug_id'];
    $medicine=$_POST['medicine'];
    $uses=$_POST['uses'];
    $times=$_POST['times'];
    $dose=$_POST['dose'];
    $days=$_POST['days'];
    $total=$_POST['total'];
    $sql ="UPDATE drug SET medicine='".$medicine."',uses='".$uses."',times='".$times."',dose='".$dose."',days='".$days."',total='".$total."' WHERE id='".$drug_id."';";
    $db->query($sql);
    header('location:../page/drug.php?ward='.$ward.'&id='.$id.'&drug='.$drug);
}


