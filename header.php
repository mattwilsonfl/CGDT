<!--HTML begins-->
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>
  </title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    
  <?php 
    include 'css/css.html';
    require 'db.php';
  ?>
</head>
    
    <style> 
            
        ul 
        {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #473E3C;
            width: 600px;
        }
        
        #ulLB
        {
            float: right;
            position: relative;
            top: -48px;
            
        }

        li 
        {
            float: left;
        }

        li a 
        {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) 
        {
            background-color: #4CAF50;
            color: black;
        }
        
        #header
        {
            height: 70px;
            background-color: #1E0B06;
        }
        
        #header_text
        {
            font-size: 5.5rem;
        }

        #logB
        {
            /*font-size: 50px;*/
            text-align: right;
        }
        
        #logB
        {
            float: right;
        }
        
        .navB
        {
            margin-right:0px;
        }
        
    </style>
    
    
    
    
<body>
    
    <!--HEADER starts-->
    <div id ='header' class = 'text-center align-bottom'>
        <p id='header_text'>Child Guidance Center</h1>
    </div>
    <!--HEADER ends-->
    
    
    
    <!--NAVBAR starts-->
    <ul>
        <!--<li id='logB'><a href="logout.php">Logout</a></li>-->
        <li class='navB'><a href="index.php">Home</a></li>
        <li ><a href="contact.php">Contact</a></li>
        <li ><a href="about.php">About</a></li>
    </ul>
    
    <ul id='ulLB'>
        <li id='logB'><a href="logout.php">Logout</a></li>
    </ul>

    <!--NAVBAR ends-->
</body>
</html>