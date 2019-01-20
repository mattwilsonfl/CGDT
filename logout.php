<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="css/style2.css">
    
    <?php 
        /*include 'css/css.html';*/
    ?>
    <style>
        #homeBtn
        {
            width: 100%;
            text-align: center;
            height: 70px;
            font-size: 35px;
        }
    </style>
    
</head>

<body>
    
    <!--container#########################################################################################
######################################################################################################
######################################################################################################-->
<div id='container'>
    
    <?php
        require 'header.php';
    ?>
    <br><br><br><br>
    <div class="form" style='background-color: white;border-style: solid;border-color:black'>
        
          <h1 style='color:black'>Logout Successful!</h1>
          <a href="index.php"><button id='homeBtn' class="btn btn-default"/>Home</button></a>
    
    </div>
</div>
</body>
</html>


