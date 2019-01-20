<!--HTML begins-->
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>
  </title>
  <!--<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
  <link rel="stylesheet" href="css/style2.css">

    
  <?php 
    require 'db.php';
  ?>
</head>
    
    <style> 
        
        #h_userAdd
        {
            font-size: 3.5rem;
        }
        
        p
        {
            color: black;
            margin: auto;
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
            padding: 20px;
            border-style: solid;
            margin:auto;
            background-color: white;
            width: 300px;
        }
        
        #header1
        {
            font-size: 6rem;
        }
        
        #addBtn
        {
            color: black;
            border-style: solid;
        }
        
    </style>
    
    
    
    
<body>
    
<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $ageToAdd = $_POST['ageToAdd'];
        $usrToAdd = $_POST['usrToAdd'];
        $roleToAdd = $_POST['roleToAdd'];
        $pswdToAdd = $_POST['pswdToAdd'];
        $emailToAdd = $_POST['emailToAdd'];
        $genderToAdd = $_POST['genderToAdd'];
        
        if 
        (   (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['usrToAdd'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['pswdToAdd'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['emailToAdd'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['roleToAdd'])) ||
            (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['ageToAdd'])) 
        )
        {
            $_SESSION['danger'] = true;
            $_SESSION['illegalString'] = "Special characters not allowed. Please try again!";
        }
        else
        {
            $Tsql = "INSERT INTO users (username, password, gender, email, role, age) VALUES ('$usrToAdd', '$pswdToAdd', '$genderToAdd', '$emailToAdd', '$roleToAdd', '$ageToAdd');";
            
            sqlsrv_query($conn, $Tsql);
            
            $_SESSION['addMessage'] = "<strong>User: <q>'$usrToAdd'</q></strong> successfully added to the system!";
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
            unset($_SESSION['danger']);
        }
            ?>
    
    
    <div id="content"> 
        <h3 id='h_userAdd' class="text-center">User Add Form</h3>
        <hr><br>
        
            <div id='subContent'>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <table>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" style='color: black' name="usrToAdd" id='user' ></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input type="text" style='color: black' name="pswdToAdd" id='pass' ></td>
                        </tr>
                        
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" style='color: black' name="emailToAdd" id='email' ></td>
                        </tr>
                        
                        <tr>
                            <td>Gender:</td>
                            <td><input type="text" style='color: black' name="genderToAdd" id='gender' ></td>
                        </tr>
                        
                        <tr>
                            <td>Role:</td>
                            <td><input type="text" style='color: black' name="roleToAdd" id='gender' ></td>
                        </tr>
                        
                        <tr>
                            <td>Age:</td>
                            <td><input type="text" style='color: black' name="ageToAdd" id='gender' ></td>
                        </tr>

                    </table>

                    <br>
                    <input id='addBtn' type="submit"  value="Add User">
                </form>				
            </div>
    </div> 
</div>
    
    
    
    
    <!--scripts-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>
<!--HTML ends-->