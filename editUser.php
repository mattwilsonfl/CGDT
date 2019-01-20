<!--HTML begins-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title></title>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="css/style2.css">
    
  <?php 
    /*include 'css/css.html';*/
    require 'db.php';
  ?>
</head>
    
    <style> 
        
        #container
        {
            height: 690px;
        }
        
        #currentInfo
        {
            position:relative;
            float: left;
            width:370px;
            height: 335px;
            border-style: solid;
            background-color: white;
            padding: 20px;
        }
        
        #newInfo
        {
            position:relative;
            float:right;
            width:370px;
            height: 335px;
            border-style: solid;
            background-color: white;
            padding: 20px;
        }
        
        h3
        {
            text-align: center;    
        }
        
        p
        {
            color: black;
            margin: auto;
        }
        
        label
        {
            text-align: center;
        }
        
        
        
        #content
        {
            color: black;
            margin: auto;
            width: 300px;
            font-size: 17px;
        }
        
        #subContent
        {
            position:relative;
            right:250px;
            /*border-style: solid;*/
            margin:auto;
            /*background-color: white;*/
            width: 800px;
            height: 350px;
            padding: 5px;
        }
        
        #h_userEdit
        {
            font-size: 3.5rem;
        }
        
        #header1
        {
            font-size: 6rem;
        }
        
        #submitBtn
        {
            border-style: solid;
            border-color: black;
            border-width: 3px;
            height: 30px;
            font-size: 16px;
            color: black;
            width: 793px;
            right: 247px;
            position: relative;
            background-color: white;
            height: 34px;
        }
        
        td
        {
            height: 38px;
        }
        
    </style>
    
    
    
    
<body>
    
<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $currentUsr = $_SESSION['userToEdit'];
        
        $usrToEdit = $_POST['usrToEdit'];
        $pswdToEdit = $_POST['pswdToEdit'];
        $emailToEdit = $_POST['emailToEdit'];
        $roleToEdit = $_POST['roleToEdit'];
        $ageToEdit = $_POST['ageToEdit'];
        
        if 
        (   (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['usrToEdit'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['pswdToEdit'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['emailToEdit'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['roleToEdit'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['ageToEdit'])) 
        )
        {
            $_SESSION['danger'] = true;
            $_SESSION['illegalString'] = "Special characters not allowed. Please try again!";
        }
        else
        {
            $Tsql = "UPDATE users
                    SET userName = '$usrToEdit', password = '$pswdToEdit', email = '$emailToEdit', role = '$roleToEdit', age = '$ageToEdit'  
                    WHERE userName = '$currentUsr'";
        
            sqlsrv_query($conn, $Tsql);
            
            $_SESSION['editMessage'] = "<strong>Current Username: <q>'$usrToEdit'</q></strong> has been successfully edited!";
            $_SESSION['success'] = true;
            $_POST = array();
            
            header('Location: therapistManager.php');
        }           
    }
?>
    
    
    
    
<!--CONTAINER#######################################################################################################
####################################################################################################################
####################################################################################################################-->
<div id='container'>
    <!--REQUIRES-->
    <?php
        require 'header.php';
        $userName = $_SESSION['userToEdit'];
        $Tsql = "SELECT  * 
                FROM users 
                WHERE username = '$userName'";
    
        $result = sqlsrv_query($conn, $Tsql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    
    /*danger alerts START*/
    if (isset($_SESSION['danger']))
    {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php     
                    if (isset($_SESSION['userNotFound']))
                    {
                        echo $_SESSION['userNotFound'];
                        unset($_SESSION['userNotFound']);
                    }
            
                    if (isset($_SESSION['illegalString']))
                    {
                        echo $_SESSION['illegalString'];
                        unset($_SESSION['illegalString']);
                    }
                ?>
            </div>
                <?php
    }
        ?>
    <!--/*danger alerts STOP*/-->
    
    
    
    
    <!--USER EDIT FORMS START####################################################################
#################################################################################################
#################################################################################################-->
    <div id="content"> 
        <h3 id ='h_userEdit' class="text-center">User edit Form</h3>
        <hr>
        
            
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div id='subContent'>
                <div id='currentInfo'>
                    <table style="width:100%">
                        <h3>Your current information</h3>
                        <tr>
                            <td>Username:   </td>
                            <td><?php echo $row['username']?></td>
                        </tr>

                        <tr>
                            <td>Password:   </td>
                            <td><?php echo $row['password']?></td>
                        </tr>
                        
                        <tr>
                            <td>Email:   </td>
                            <td><?php echo $row['email']?></td>
                        </tr>
                        
                        <tr>
                            <td>Role:   </td>
                            <td><?php echo $row['role']?></td>
                        </tr>
                        
                        <tr>
                            <td>Age:   </td>
                            <td><?php echo $row['age']?></td>
                        </tr>
                        
                        <hr>

                    </table>
                </div>
                    
                <div id='newInfo'>
                    <table style="height:10px">
                        
                        <h3>Your new information</h3>
                        <hr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" style='color: black' name="usrToEdit" id='user' ></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input type="text" style='color: black' name="pswdToEdit" id='pass' ></td>
                        </tr>
                        
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" style='color: black' name="emailToEdit" id='email' ></td>
                        </tr>
                        
                        <tr>
                            <td>Role:</td>
                            <td><input type="text" style='color: black' name="roleToEdit" id='role' ></td>
                        </tr>
                        
                        <tr>
                            <td>Age:</td>
                            <td><input type="text" style='color: black' name="ageToEdit" id='age' ></td>
                        </tr>

                    </table>

                    <?php       
                        unset($_SESSION['danger']);         
                    ?>
                    <br>
                    
                </div>			
            </div>
            
            <input type="submit" id='submitBtn' value="Edit User">
        </form>
    </div> 
    <!--USER EDIT FORMS START####################################################################
#################################################################################################
#################################################################################################-->
    
    
    
</div>
    
    
    
    
    
    <!--scripts-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>
<!--HTML ends-->