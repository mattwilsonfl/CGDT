<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style2.css">

    <?php 
        require 'db.php';
    ?>
    <style>
        
        #resetPassBlock
        {
            padding: 20px;
            position:relative;
            border-style: solid;
            margin:auto;
            background-color: white;
            width: 650px;
            height: 125px;
        }
        
        #reset-pass-header
        {
            position: absolute;
            left:41%;
            font-size: 35px;
            color:black;
        }
        
        #submitButton
        {
            margin: auto;
            position: fixed; 
            bottom: 110px;
            left: 351px;
            width: 650px;
            height: 70px;
            color: black;
            border-style: solid;
        }
        
    </style>
</head>
<body>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (($_POST['question']) == "paul")
            {
                $password = $_POST['password'];
                $userName = $_SESSION['userName'];
                
                $Tsql = "UPDATE users
                        SET password='$password'
                        WHERE username='$userName';";
                sqlsrv_query($conn, $Tsql);
                
                $_SESSION['success'] = "Congratulations, your password has been changed!";
            }
            
            else
            {
                $_SESSION['danger'] = "Incorrect response to security question! Try again.";
            }
                
        }
    ?>
    
    <!--CONTAINER#######################################################################################################
####################################################################################################################
####################################################################################################################-->
<div id='container'>
    <?php
        require 'header.php';
    ?>
   
    <?php
     
    if (isset($_SESSION['success']))
        { 
    ?>
            <div class="alert alert-success" id='alertArea'>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
                <?php
                    unset($_SESSION['success']);
        }
        /*success alerts stop*/
        

        
        /*danger alerts start*/
        if (isset($_SESSION['danger']))
        {
                ?>
            <div class="alert alert-danger" role="alert">
                <?php
                        echo $_SESSION['danger'];
                        unset($_SESSION['danger']);
                ?>
            </div>
                <?php
        }
                ?>
   

    <br>
    <p id='reset-pass-header'>
        Reset Password
    </p>
    <hr><br><br><br>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div id='resetPassBlock'>
                    <div id='resetPass'>
                        <table>

                            <tr>
                                <td style='font-size: 20px'>What is your fathers middle name?:</td>
                                <td><input type="text" style='color: black' name="question" id='question' ></td>
                            </tr>

                            <tr>
                                <td style='font-size: 20px'>New Password:</td>
                                <td><input type="password" style='color: black' name="password"></td>
                            </tr>

                        </table>
                   </div>    
            </div>
        
            <div id='submitButton'>
                <input type="submit" class="btn btn-default" style='color: black; font-size: 20px' value="Change Password">           
            </div> 
    </form>
        
        
</div>
</body>
</html>

    
 
