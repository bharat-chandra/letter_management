<html>
    <head>
        <style>
            .c{
                padding-top:10%;
            }
            a{
                cursor:auto;
            }
        </style>
    </head>
    <body>
<?php
include "common.php";
if(isset($_SESSION['reg']) && isset($_SESSION['id'])){
$query="SELECT * FROM images where userid='".$_SESSION['id']."'";
$stmt = $dbo->prepare($query);
$stmt->bindColumn(1,$name);
$stmt->bindColumn(2,$type);
$stmt->bindColumn(3,$pdf_doc,PDO::PARAM_LOB);

$q1 = "SELECT * FROM users where id='".$_SESSION['id']."' ";
$s1 = $dbo->query($q1)->fetch();
if($s1["reg"] == "bharat.dev200@gmail.com")
{
    $q2 = "SELECT * FROM images";
    //$s2 = $dbo->prepare($query);
    echo "<div class=\"col-md-6 offset-md-3 c table-responsive\"><table class=\"table table-striped table-dark \"><thead class=\"\"><tr><th>From</th><th>Subject</th><th>FileName</th><th>Type</th><th>Doc</th><th>Status</th></tr></thead>";
    foreach($dbo->query($q2) as $row)
    {
        if(in_array("on",json_decode($row['too'],true)))
        {
            $from = $dbo->query("select reg from users where id=(select userid from images where id='".$row['id']."')")->fetch();
            if($row['status']==0){$temp="pending";}
            if($row['status']==1){$temp="accepted";}
            if($row['status']==-1){$temp="rejected";}
            echo "<tbody class=\"\"><tr><td>$from[0]</td><td>$row[subject]</td><td>$row[filename]</td><td>$row[type]</td><td><a target=blank href=open.php?id=$row[id]".">view doc</a>
                    <a target=blank href=download.php?id=$row[id]".">Download doc</a></td>";
            if($temp=="pending")
            {
                echo "<td><a id=\"change\" href=\"\" onclick=\"change(".$row['id'].",1)\">accept</a>
                    <br><a id=\"change\" href=\"\" onclick=\"change(".$row['id'].",-1)\">reject</a></td>";
            }
            else{
                echo "<td>$temp</td></tr></tbody>";
            }
        }
    }
    echo "</table></div>";
    
}
else if($s1["reg"] == "coord@gmail.com")
{
    $q2 = "SELECT * FROM images";
    //$s2 = $dbo->prepare($query);
    echo "<div class=\"col-md-6 offset-md-3 c table-responsive\"><table class=\"table table-striped table-dark \"><thead class=\"\"><tr><th>Id</th><th>Subject</th><th>FileName</th><th>Type</th><th>Doc</th><th>Status</th></tr></thead>";
    foreach($dbo->query($q2) as $row)
    {
        if(in_array("Coordinator",json_decode($row['too'],true)))
        {
            if($row['status']==0){$temp="pending";}
            if($row['status']==1){$temp="accepted";}
            if($row['status']==-1){$temp="rejected";}
            echo "<tbody class=\"\"><tr><td>$row[id]</td><td>$row[subject]</td><td>$row[filename]</td><td>$row[type]</td><td><a target=blank href=open.php?id=$row[id]".">view doc</a>
                    <a target=blank href=download.php?id=$row[id]".">Download doc</a></td>";
            if($temp=="pending")
            {
                echo "<td><a id=\"change\" href=\"\" onclick=\"change(".$row['id'].",1)\">accept</a>
                    <br><a id=\"change\" href=\"\" onclick=\"change(".$row['id'].",-1)\">reject</a></td>";
            }
            else{
                echo "<td>$temp</td></tr></tbody>";
            }
        }
    }
    echo "</table></div>";
    
}
else{
    echo "<div class=\"col-md-6 offset-md-3 c table-responsive\"><table class=\"table table-striped table-dark \"><thead class=\"\"><tr><th>Id</th><th>Subject</th><th>to</th><th>FileName</th><th>Doc</th><th>Status</th></tr></thead>";
    foreach($dbo->query($query) as $row)
    {
        if($row['status']==0){$temp="pending";}
        if($row['status']==1){$temp="accepted";}
        if($row['status']==-1){$temp="rejected";}
        $x = json_decode($row['too'],true);
        $t="";
        foreach($x as $y)
        {
            if( $y=="on")
                $y="Hod";
            $t.=$y.",";
        }
        echo "<tbody class=\"\"><tr><td>$row[id]</td><td>$row[subject]</td><td>$t</td><td>$row[filename]</td><td><a target=blank href=open.php?id=$row[id]".">view doc</a>
                <a target=blank href=download.php?id=$row[id]".">Download doc</a>
                <a id=\"change\" href=\"\" onclick=\"change(".$row['id'].")\">reject</a></td><td>$temp</td>";
        
    }
    echo "</tr></tbody></table></div>";
}
}
else{
    header("Location:index.php");
}
?>
        <script type="text/javascript" lang="javascript">
            function change(id,x){
                var id = parseInt(id);
                var x = parseInt(x);
		$.ajax({
                    type:"POST",
                    url:"change.php",
                    data:{set:x,val:id},
                    success:function(html){
                        //alert("done");
                    }
                });
		
            };
        </script>
</body>
</html>