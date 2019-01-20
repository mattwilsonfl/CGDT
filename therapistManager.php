<!--SESSION initialization-->
<?php
    session_start();
    $userName = $_SESSION['userName'];
?>




<!--HTML begins-->
<!DOCTYPE html>
<html >
    
    <!--HEAD STARTS##############################################################################################################
###############################################################################################################################
###############################################################################################################################-->
<head>
    <meta charset="UTF-8">
    <title>Therapist manager</title>
    
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="css/style2.css">
    
    <script>
    </script>

    <!--style elements-->
    <style>
        
        #radioBtn
        {
            padding: 55px;
        }

        #title
        {
            position: fixed;
            top: 170px;
            left:538px;
            text-align: center;
            font-size: 5px;
        }

        #con2
        {
            position: relative;
        }

        #managerOutput
        {
            background: white;
            border-style: solid;
            text-align: center;
            position: relative;
            left: 580px;
            top: -278px;
            height:232px;
            width: 335px;
        }

        #displayHeader
        {
            position: relative;
            left: 150px;

        }

        #therapist-display
        {
            /*left: 10px;*/
            border-style: solid;
            background: white;
            height:230px;
            width: 350px;
            position: relative;
            left: 65px;
            /*margin: auto*/
        }

        #button-group
        {
            position: relative;
            text-align: center;
            top: 15px;
            left: -49px;
            /*border-style: solid;*/
            width: 450px;
            /*margin: auto*/
        }

        #searchButton
        {
            width: 100px;
            left: 580px;
            top: -263px;
            text-align: left;
            position: relative;
        }

        #searchText
        {
            width: 233px;
            left: 680px;
            top: -310px;
            text-align: left;
            position: relative;
        }

        .big
        { 
            width: 1em; height: 1em; 
        }

        .btn 
        {

            background-color: black;
        }

        /*table,  th, td 
        {
            border: 1px solid black;
            padding: 15px;
        }*/ 
        
    </style>
</head>

    
   
    
    
    <!--BODY STARTS##############################################################################################################
###############################################################################################################################
###############################################################################################################################-->
<body>
    
    <?php  
    /*INCLUDES/REQUIRES*/
    require 'db.php';
        
    /*<!--THERAPIST MANAGEMENT METHODS START -->*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        { 
            /*if(isset($_POST['usrToAdd']))
            {
                echo "made it back to therapist with req method as POST";
                echo $_POST['usrToAdd'];
            }*/
            
            
            /*DELETE THERAPIST starts*/
            if (isset($_POST['deleteTherapist']) == true)
            {
                $Tsql = "SELECT userName FROM users";
                
                $result = sqlsrv_query($conn, $Tsql);
                       
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
                        {
                            $tempName = $row["username"];
                            
                            if (isset($_POST['tempName'])) //check
                            {
                                if (($_POST['tempName']) == 'Admin')
                                {
                                    $_SESSION['danger'] = true;
                                    $_SESSION['adminDelete'] = "Unauthorized delete attempt on <strong>user: <q>Admin</q></strong>";
                                }
                                else
                                {
                                    $radioVal = $_POST["tempName"];
                                    $Tsql = "DElETE FROM users WHERE userName = '$radioVal'";
                                    sqlsrv_query($conn, $Tsql);
                                    
                                    $_SESSION['deleteMessage'] = "<strong>User: <q>'$radioVal'</q></strong> has been successfully deleted from system!";
                                    $_SESSION['success'] = true; 
                                }
                            }
                        } 
                     
                unset($_POST['searchText']);
            }
            /*DELETE THERAPIST stops*/
            
            
            
            /*ADD THERAPIST starts*/
            if (isset($_POST['addTherapist']) == true)
            {
                header('Location: addUser.php');
            }
            /*ADD THERAPIST stops*/
            
            
            
            /*EDIT THERAPIST starts*/
            if (isset($_POST['editTherapist']) == true)
            {
                $_SESSION['userToEdit'] = $_POST['tempName'];
                header('location: editUser.php');
            }
            /*EDIT THERAPIST stops*/ 
            
            
            
            /*SEARCH THERAPIST STARTS*/  
            if (isset($_POST['searchText']))
            {
                
                /*$radioVal = $_POST["tempName"];*/
                $searchText = $_POST['searchText'];
                $Tsql = "SELECT * FROM users WHERE userName='$searchText'";
                $result = sqlsrv_query($conn, $Tsql);
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $searchText))
                {
                    $_SESSION['danger'] = true;
                    $_SESSION['illegalString'] = "Special characters not allowed. Please try again!";
                }

                elseif ($row >= 1)
                {
                    $searchEmail = $row["email"];
                    $searchUserName = $row["username"];
                    $searchGender = $row["gender"];
                    $searchRole = $row["role"];
                    $searchAge = $row["age"];

                    $_SESSION['success'] = true;
                    $_SESSION['searchMessage'] = "Search for <strong>User: <q>'$searchText'</q></strong> has been successful!";
                }

                else
                {
                    $_SESSION['danger'] = true;
                    $_SESSION['userNotFound'] = "User not found! Please try again.";
                }
            }
        }    /*<!--SEARCH THERAPIST STARTS-->*/
    ?>
    <!--THERAPIST MANAGEMENT stops-->

    
    
    
    <!--CONTAINER STARTS#####################################################################################
#############################################################################################################
#############################################################################################################-->
    <div id='container'>
        
    <!--INCLUDES/REQUIRES-->
    <?php 
    /*include 'css/css.html';*/
    require 'header.php';
    
    
        /*<!--SUCCESS/DANGER ALERTS START##################################
        ###################################################################
        ###################################################################-->*/
        
        /*<!--success alerts starts-->*/
        if (isset($_SESSION['success']))
        {
    ?>
            <div class="alert alert-success" id='alertArea'>
                <?php
                /*$addMessage = $_SESSION['addMessage'];*/

                    if(isset($_SESSION['deleteMessage']))  
                    {
                        echo $_SESSION['deleteMessage'];
                        unset($_SESSION['deleteMessage']);
                    }

                    if(isset($_SESSION['addMessage']))  
                    {
                        echo $_SESSION['addMessage'];
                        unset($_SESSION['addMessage']);
                    }

                    if(isset($_SESSION['editMessage']))  
                    {
                        echo $_SESSION['editMessage'];
                        unset($_SESSION['editMessage']);
                    }

                    if(isset($_SESSION['searchMessage']))  
                    {
                        echo $_SESSION['searchMessage'];
                        unset($_SESSION['searchMessage']);
                    }
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
            
                    if (isset($_SESSION['adminDelete']))
                    {
                        echo $_SESSION['adminDelete'];
                        unset($_SESSION['adminDelete']);
                    }
                ?>
            </div>
                <?php
        }
                ?>
        <!--/*danger alerts stop*/-->
        
        <!--/*SUCCESS/DANGER ALERTS STOP##################################
        ###################################################################
        ###################################################################*/-->
        
        
            
        
        
        
        <!--/*THERAPIST DISPLAY/MANAGER OUTPUT STARTS###############################################################################
        #######################################################################################################
        #######################################################################################################*/-->
        
        
        <div id='alertLessContainer'>
        <br><br><br><br>
            <div id='title'><strong><font size="6">Therapist Manager</font></strong>
            </div>
            
            <div id='con2'>
                
                <div id='displayHeader'>
                    <h3> Therapist Display &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp Search Display</h3>
                </div> 
                
                <!--problem--form ends outside of div boundary-->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                    <!--THERAPIST DISPLAY STARTS-->
                    <div class="border pre-scrollable text-center" id='therapist-display'>  
                        <?php  
                            $Tsql = "SELECT username FROM users";
                            $result = sqlsrv_query($conn, $Tsql);
                            
                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
                            {
                                $tempName = $row["username"];          
                                echo "<input type='radio' id='radioBtn' class='big' name='tempName' value='$tempName'>'$tempName'</input> ";
                                echo '<hr style="height:1px;border:none;color:black;background-color:black;" />';
                                echo "<hr>";
                            }
                            
                        ?>
                    </div>
                    <!--THERAPIST DISPLAY STOPS-->



                    <!--button group starts-->
                    <div id='button-group' class = "btn-group-lg" >
                        <button class="btn btn-primary btn-lg" name="addTherapist"/>Add </button>
                        <button class="btn btn-primary btn-lg" name="editTherapist"/>Edit </button>
                        <button class="btn btn-primary btn-lg" name="deleteTherapist"/>Delete </button>
                    </div>
                    <!--button group stops-->
            </div>



                    <!--MANAGER OUTPUT starts-->
                    <div id='managerOutput'>
                        <?php  
                            if (isset($_POST['searchText']) && !(isset($_SESSION['danger'])))
                            {    
                                /*if($row[0] >= 1)*/

                                    echo   "<table height=100% width =100%>

                                                <tr>
                                                    <td><strong>Username: </strong></td> <td><strong>'$searchUserName'</strong></td>
                                                </tr>  
                                                
                                                <tr>
                                                    <td>Email: </td> <td>'$searchEmail'</td>
                                                </tr>

                                                <tr>
                                                    <td>Gender: </td> <td>'$searchGender'</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Age: </td> <td>'$searchAge'</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Role: </td> <td>'$searchRole'</td>
                                                </tr>

                                            </table>";
                                
                            }
                            unset($_SESSION['danger']);
                            /*sqlsrv_close($conn);*/
                        ?>
                    </div>
                    <!--MANAGER OUTPUT ends-->

                    <!--SEARCH BUTTON/TEXT FIELD starts-->
                    <div id='searchButton'>
                        <button class="btn btn-primary btn-lg"  name="searchButton"/>Search </button>
                    </div>

                    <div id='searchText'>
                        <input style='height:48px;font-size:14pt; background-color:white; color:black;' height="200" type="text" name="searchText" placeholder="Enter Username...">
                    </div>
                    <!--SEARCH BUTTON/TEXT FIELD ends-->
                </form>
        
            </div>  
        </div>
    </div>
            <!--THERAPIST DISPLAY/MANAGER OUTPUT STOPS###############################################################################
            #######################################################################################################
            #######################################################################################################-->




</body>
</html>
<!--HTML ends-->