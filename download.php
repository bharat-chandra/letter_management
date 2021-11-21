<?php
include_once "common.php";
if (isset($_GET['id'])) {
    $fileid = $_GET['id'];
    try {
      $sql = "SELECT * FROM `images` WHERE `id` = '".$fileid."'";
        $results = $dbo->query($sql);echo $sql;
        while ($row = $results->fetch()) {
            $filename = $row['filename'];
            $mimetype = $row['type'];
            $filedata = $row['image'];
            header("Content-length: ".strlen($filedata));
            header("Content-type:".$mimetype);
            header("Content-disposition: attachment; filename=$filename"); //disposition of download forces a download
            ob_clean();
            flush();
            echo $filedata; 
            // die();
        } //of While
    } //try
    catch (PDOException $e) {
        $error = '<br>Database ERROR fetching requested file.';
        echo $error;
        die();    
    } //catch
} //isset
?>