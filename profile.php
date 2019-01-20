<?php
    /* Displays user information and some useful messages */
    session_start();


    // Check if user is logged in using the session variable
    if ( $_SESSION['logged_in'] != 1 ) 
    {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: error.php");    
    }
    else 
    {
        // Initializes sessions
        $userName = $_SESSION['userName'];
        $active = $_SESSION['active'];
    }
?>



    <!--HTML begins##################################################################################-->
    <!--#################################################################################################
    #################################################################################################-->

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome <?= $userName ?></title>
        <link rel="stylesheet" href="css/style2.css">
    
<?php 
      /*include 'css/css.html';*/
?>
    
        <style>
        </style>
    </head>

    <body>

        <!--container###############################################################################################################
    ################################################################################################################################
    ################################################################################################################################-->
    <div id='container'>
<?php
        require 'header.php';
?>

        <!--PROFILE form-->
        <div class="form">

            <h1> Welcome <?php echo $userName; ?></h1>

            <?php
               if ($userName == 'Admin')
               {
                    header("location: adminDashboard.php");
               }
            ?>

            <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

        </div>
    </div>




    <!--scripts-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

    </body>
    </html>
