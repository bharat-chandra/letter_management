<?php
include "common.php";
require("mail.php");
$send = new sendMail();

if(isset($_SESSION['reg']) && isset($_SESSION['id'])){
if(isset($_POST['submit']) && !empty($_FILES['my_image']['name']))
{
    if ($_FILES['my_image']['error'] != 0)
    {
        echo 'Something wrong with the file.';
    }
    else{
        $name = $_POST['subject'];
        $to = json_encode($_POST['array']);
        $type = $file_tmp = $_FILES['my_image']['type'];
        $filename = $_FILES['my_image']['name'];
        $file_tmp = $_FILES['my_image']['tmp_name'];
        if ($pdf_blob = fopen($file_tmp, "rb"))
        {
            $photo= file_get_contents($file_tmp); // reading binary data
            $query="insert into images(userid,subject,too,filename,type,image) values(:userid,:subject,:too,:filename,:type,:image)";
            $step=$dbo->prepare($query);
            $step->bindParam(':userid',$_SESSION['id']);
            $step->bindParam(':subject',$name);
            $step->bindParam(':too',$to);
            $step->bindParam(':filename',$filename);
            $step->bindParam(':type',$type);
            $step->bindParam(':image',$photo,PDO::PARAM_LOB);

            if($step->execute()){
            echo " Data with Photo is added ";
            $x = json_decode($to,true);
            foreach($x as $y)
            {
                if($y=="on"){
                    $send->send("bharat.chandra200@gmail.com");
                }
                if($y=="Coordinator"){
                    $send->send("bharat.dev200@gmail.com");
                }
            }
          
            }
            else{
                echo " Not able to add data please contact Admin ";
                print_r($step->errorInfo()); 
                }
            ?>
            <br><a href="user.php">upload another file</a>
            <?php
        }
        else
        {
                //not successful in opening the file for reading.
                echo 'Could not open the attached pdf file';
        }
    }
}
else
{
    header('Location:upload.php');
}
}
else{
    header("Location:index.php");
}
?>