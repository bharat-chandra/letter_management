<?php
require("common.php");

$reg = $_POST['reg'];
$password = $_POST['password'];
$password = md5($password);

$query = "SELECT * FROM users WHERE reg = '".$reg."'  ";
$result = $dbo->prepare($query) or die(($con));
  $num = $result->fetchColumn();

  if ($num != 0) {
    $m = " Account Already Exists";
    header('location: signup.php?m1='.$m);
  } else {
    $query = "insert into users(reg,password) values ('" . $reg . "','" . $password . "')";
    $res = $dbo->prepare($query);
    $res = $res->execute();
    if($res)
      header("location:index.php");
    else{
      echo("<script> alert(\"cannot signup\"); </script>");
      echo("<a href=\"index.php\">try again</a>");
  }
}
?>
