<?php
require("common.php");

$reg = $_POST['reg'];
$password = $_POST['password'];
$password = md5($password);

$query = "SELECT * from users where reg=:reg and password = :password ";
$result = $dbo->prepare($query) or die(($con));
$result->bindParam(':reg',$reg);
$result->bindParam(':password',$password);
$result->execute();
$r = $result->fetch(PDO::FETCH_ASSOC);
//print_r($r);

if (count($r) == 0) {
  header('location:index.php?msg=please enter correct details if your account exist , or else create your account now');
} else {
 
  $_SESSION['reg'] = $r['reg'];
  $_SESSION['id'] = $r['id'];
  $user_id = $r['id'];
  header('location:user.php');
}
?>
