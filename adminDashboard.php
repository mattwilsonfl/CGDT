<!--SESSION initialization-->
<?php

    session_start();
    $userName = $_SESSION['userName'];

?>



<!--HTML begins-->
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" href="css/style2.css">
    <?php 
        /*include 'css/css.html'; */
    ?>
    
    <style>
        #tmBtn
        {
            width: 100%;
            text-align: center;
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
    
    
    <br><br><br><br>
    <div class="form" style='background-color: white;border-style: solid;border-color:black'>
        
          <h1 style='color: black;'>Administrator Dashboard</h1>
          <a href="therapistManager.php"><button id='tmBtn' class="btn btn-default"/>Therapist Manager</button></a>
    
    </div>
    <!--Admin Dashboard starts-->
    <!--<div class="form">
        
        <h1> Administrator Dashboard</h1>
        
            check log in form for details on how to style buttons
            <a href="therapistManager.php"><button class="button button-block" name="therapistManager"/>Therapist Manager</button></a>
    </div>-->
    <!--Admin Dashboard ends-->
</div>
    
    
    
    <!--scripts-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>

</body>
</html>
<!--HTML ends-->