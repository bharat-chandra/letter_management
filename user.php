<html>
    <head>
        
    </head>
    <body>
<?php
include_once("common.php");
if(isset($_SESSION['reg']) && isset($_SESSION['id']))
{ 
    if($_SESSION['reg']=="hod@gmail.com")
    {
        header("location:showdata.php");
    }
    ?>
    <center>
    </p><h4 class="text-center" style="">Upload Your File</h4>
    <div class="jumbotron" style="margin-top: 115px;">
        <form class="form-inline" action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="formgroup col-auto">
                <input type="text" name="subject" class="form-control" placeholder="enter the subject for letter" required>
            </div>
            <div class="formgroup col-auto">
                <input type="file" name="my_image" class="form-control" required>
            </div>
            SEND TO :
            <div class="formgroup col-auto form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="array[]">
                <label class="form-check-label" for="flexCheckDefault">
                    hod
                </label>
            </div>
            <div class="formgroup col-auto form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="Coordinator" name="array[]">
                <label class="form-check-label" for="flexCheckDefault">
                    coordinator
                </label>
            </div>
            <div class="formgroup col-auto">
                <input type="submit" name="submit" class="btn-success form-control"/>
            </div>
        </form>
    </div>
    </center>
    <?php } 
else{
    header("location:index.php");
}
?>
</body>
</html>