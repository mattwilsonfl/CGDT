<?php
    require 'db.php';
    session_start();
    // LOG-IN processing--checks if user/password is correct; sets sessions etc. 

    // protects against SQL injections/fetches the record

    $userName = $_POST['userName'];
    $_SESSION['userName'] = $userName;
    
    if (!isset($loginCount))
    {
        $loginCount = 0;
    }

    if (isset($_SESSION['loginCount']))
    {
        $loginCount = $_SESSION['loginCount'];
    }
    



    $Tsql = "SELECT * FROM users WHERE USERNAME = '$userName';";
    $result = sqlsrv_query($conn, $Tsql);



    // If user doesn't exist
    if ( $result == FALSE )
    { 
            $_SESSION['message'] = "Incorrect Username!";
            header("location: error.php");
    }

    // If user exists
    else 
    { 
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        //if password is a match
        if ($_POST['password'] == $row['password']) 
        {
            $_SESSION['logged_in'] = true;
            unset($_SESSION['loginCount']);
            header("location: profile.php");
        }
        //if password isn't a match
        else 
        {
            $_SESSION['message'] = "Incorrect password!";
            $loginCount++;
            $_SESSION['loginCount'] = $loginCount;
            header("location: error.php");
        }
    }
?>

