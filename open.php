<?php
include_once "common.php";
if(isset($_SESSION['reg']) && isset($_SESSION['id'])){
$id = $_GET['id'];
$query="SELECT * FROM images where id=$id";
$stmt = $dbo->prepare($query);
foreach($dbo->query($query) as $row){
if($row['type']=="image/png"||$row['type']=="image/jpg"||$row['type']=="image/jpeg")
{
    $data = "data:".$row['type'].";base64,";
    echo "<img src=".$data.base64_encode($row['image']).">";
}
if($row['type']=="application/pdf")
{
    $data = "data:".$row['type'].";base64,";
    ?>
    <object data=<?php echo $data.base64_encode($row['image']) ?> type=<?php echo $row['type']?> style="width:100%;height:100%"></object>
<?php
}
if($row['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")
{
    $data = "data:".$row['type'].";base64,";
    ?>
    <object data=<?php echo $data.base64_encode($row['image']) ?> type=<?php echo $row['type']?> style="width:100%;height:100%"></object>
    <?php
}
}
}
else{
    header("Location:index.php");
}
?>