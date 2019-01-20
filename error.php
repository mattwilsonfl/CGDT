<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link rel="stylesheet" href="css/style2.css">
    <?php 
       /* include 'css/css.html';*/
    ?>
    <style>
        
        #btnLogIn
        {
            width: 240px;
            height: 50px;
            color: black;
            font-size: 20px;
            border-style: solid;
        }
        
        #errorBlock
        {
            position:relative;
            top: 100px;
            background-color: white;
            text-align: center;
            border-style: solid;
            border-color: black;
            width: 300px;
            height: 290px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    
    
    <!--CONTAINER#######################################################################################################
####################################################################################################################
####################################################################################################################-->
<div id='container'>
    <?php
        require 'header.php';
    ?>
    
    <div id='errorBlock'>
        <h1 style='color:red'>Error</h1>
            <font style="font-size: 18px;">
                <?php 
                    if( isset($_SESSION['message']))
                    {
                        echo $_SESSION["message"];
                        echo '<br><br>';
                    }

                    else
                    {
                         header( "location: index.php" );
                    } 
                ?>
        </font>
        <a href="index.php"><button class="btn btn-default" id='btnLogIn'>Try Again</button></a><br>
    <?php
        if(($_SESSION['message'] === "Incorrect password!") && ($_SESSION['loginCount'] > 1))
        {
            echo "<a href='resetPass.php'><button class='btn btn-default' id='btnLogIn'>Reset Password</button></a>";
        }
    ?>
    </div>
</div>
</body>
</html>


