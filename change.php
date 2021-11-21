<?php
include_once 'common.php';
require 'mail.php';
$send = new sendMail();

$val = $_POST['val'];
$set = $_POST['set'];
$query = "update images set status=$set where id=:val";
$result = $dbo->prepare($query) or die(($con));
$result->bindParam(':val',$val);
$result->execute();

$send->send("");
//header('location:showdata.php');

?>

