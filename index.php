<html>
    <head>
        <meta charset="UTF-8">
        <title>DIGITAL LETTER SYSTEM 📝</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <style>
            body {
                color:black;
                margin:0;
                font-family: 'Architects Daughter', cursive;
                font-size: 15px;
         
                background-repeat: no-repeat;  /* Background Image Will not repeat */
                background-attachment: fixed;  /* Background Image will stay fixed */
                background-size: cover; 
            }
            .mainhead{
                font-size: 30px;
                font-family: 'Black Ops One', cursive;
            }
            .heading{
                width: 50%;
                margin: 30px auto;
                text-align: center;
                color: #6B8E23;
                background: #FFF8DC;
                border-radius: 20px;
            }
            form{
                width: 50%;
                margin: 30px auto;
                border-radius: 5px;
                padding: 10px;
                background: #FFF8DC;
                border: 1px solid #6B8E23;
            }
            form p{
                color: red;
                margin:0px;
            }
            .task_input{
                width: 73%;
                height: 15px;
                padding: 10px;
                border: 2px solid #6B8E23;
            }
            .add_btn{
                height: 39px;
                background: #FFF8DC;
                color:#6B8E23;
                border-radius: 5px;
                border:2px solid #6B8E23;
                padding: 5px 20px;
            }
            table{
                width: 50%;
                margin: 30px auto;
                border-collapse: collapse;
                
            }
            @media (max-width:873px){
                    form{width:100%;}
                .heading{
                    width: 100%;
                }
                table{
                    width: 100%;
                }
            }
            @media (max-width:440px){
                    form{width:100%;}
                .task_input{
                    width: 60%;
                }
                .add_btn{
                margin-left: 20px;
            }
            }
            @media (max-width:353px){
                    form{width:100%;}
                .task_input{
                    width: 60%;
                }
                .add_btn{
                margin-left:0px;
            }
            }
            @media (max-width:301px){
                    form{width:100%;}
                .task_input{
                    width: auto;
                }
                .add_btn{
                margin: auto;
            }
            }
            tr{
                border-bottom: 1px solid #cbcbcb;
               
            }
            th,td{
                border:none;
                height: 30px;
                padding: 2px;
            }
            tr:hover{
                background: #E9E9E9;
            }
            .task{
                text-align: left;
                
            }
            .delete{
                text-align: center;
            }
            .delete a{
                color: white;
                background: #a52a2a;
                padding: 1px 6px;
                border-radius: 3px;
                text-decoration: none;
            }
            </style>
    </head>
    <body>
        <div class="heading">
            <h2 class="mainhead" style="padding-top:10px">DIGITAL LETTER SYSTEM 📝</h2> 
            <?php
                include("login.php");
            ?>
    </body>
</html>