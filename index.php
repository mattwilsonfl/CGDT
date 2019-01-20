<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign-Up/Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style2.css">
    
    <style>
        
        #userPass
        {
            padding; 20px;
        }
        
        #logIn
        {
            padding: 20px;
            position:relative;
            border-style: solid;
            margin:auto;
            background-color: white;
            width: 390px;
            height: 160px;
        }
        
        #log-in-header
        {
            position: absolute;
            left:46%;
            font-size: 35px;
            color:black;
        }
        
        #submitButton
        {
            position: fixed; 
            bottom: 270px;
            left: 500px;
            width: 347px;
        }
        
        td
        {
            padding: 20px;
        }
    </style>
    
</head>
    
<!--ONLY runs when user has clicked LOG-IN-->

<body>
    
    
    
<!--CONTAINER#######################################################################################################
####################################################################################################################
####################################################################################################################-->
<div id='container'>
    <?php
        require 'header.php';
    ?>
    
    <br>
    <p id='log-in-header'>
        Log-In
    </p>
    <hr><br><br><br>
    
        <form method="post" action="login.php">
            <div id='logIn'>
                    <div id='userPass'>
                        <table>

                            <tr>
                                <td style='font-size: 20px'>Username:</td>
                                <td><input type="text" style='color: black' name="userName" id='user' ></td>
                            </tr>

                            <tr>
                                <td style='font-size: 20px'>Password:</td>
                                <td><input type="password" style='color: black' name="password" id='pass' ></td>
                            </tr?

                        </table>
                   </div>
                   
                   <div id='submitButton'>
                        <input type="submit" class="btn btn-default" style='color: black; font-size: 20px' value="Log In">           
                   </div>     
            </div>
        </form>
</div>
<!-- LOG-IN form ENDS -->
  

    <!--  JS scrips-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>


