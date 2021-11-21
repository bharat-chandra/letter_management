<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <meta name="viewport" content="width=device-width , initial-scale=1">
    </head>
    <body>
        <?php
        //    $con = mysqli_connect("localhost","root","","letters")or die("connection problem");
        //if(!isset($_SESSION)){
        //     session_start();
        //}
        $host_name = "localhost";
        $database = "letters"; 
        $username = "root";  
        $password = ""; 
        try {
        $dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
        session_start();
        ?>
        <div class="navbar navbar-light bg-light">
            <a class="btn btn-danger" href="logout.php">Logout</a>
            <a class="btn btn-danger" href="user.php">Upload Files</a>
            <a class="btn btn-primary" href="showdata.php">Your Files</a>
        </div><br>
        <?php
        } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        }
        ?>
    </body>
</html>
