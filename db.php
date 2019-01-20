<?php

    /*$host = 'localhost';
    $user = 'root';
    $pass = 'password';
    $db = 'accounts';
    $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);*/

    $serverName = "mysqlserver0671.database.windows.net"; 
    $connectionOptions = array
                        (
                            "Database" => "accounts", 
                            "Uid" => "azureuser", 
                            "PWD" => "Password1" 
                        );

    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $Tsql = "SELECT  * 
            FROM users 
            WHERE userName = 'Admin'";
    
    //fetches the record in raw form
    $result = sqlsrv_query($conn, $Tsql);
    
    //converts raw form data into a form available to php 
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
