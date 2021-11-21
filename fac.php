<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body{
                font-family: "Architects Daughter", cursive;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['reg']) and !isset($_GET['acc'])) {?>
        <form method="POST" action="login_submit.php">
                <div class="form-group">Email Id : <input class="form-control"  type="email" placeholder="email" name="reg" required></div> 
                <div class="form-group">Password : <input class="form-control"  type="password" placeholder="Password" name="password" required></div>
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo "<div class=\"form-group\"> $msg </div>";
            }
            ?>
	        <?php
                  if(isset($_GET['m1'])){
                      $m1 = $_GET['m1'];
                      echo "<div class=\"form-group\" style=\"color:red\">$m1 , now <a href=\"index.php\"><u>Login</u></a></div>";
                      die();
                  }                        
                ?>
                <div class="form-group"><input type="submit" class="btn btn-primary form-control" value="Login"></div>
                <div class="form-group">Dont have account? <a href="fac.php?acc=new">Signup</a></div>
        </form>

            <?php
            }elseif(isset($_GET['acc'])) { ?>
            <form action="signup_submit.php" method="POST" >
                <div class="form-group">Email Id : <input class="form-control"  type="email" placeholder="email" name="reg"  required></div> 
                <div class="form-group">Password : <input class="form-control"  type="password" placeholder="Password" name="password" required></div>
                <div class="form-group"><button class="btn btn-primary form-control">Signup</button></div>
            </form>
                <?php } ?>
    </body>
</html>
