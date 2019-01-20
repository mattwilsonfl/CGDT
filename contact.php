<!--HTML begins-->
<!DOCTYPE html>
<html >
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
        
        #title
        {
            position: relative;
            top: 20px;
            left:33%;
            text-align: center;
            font-size: 5px;
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
            width: 800px;
            font-size: 17px;
        }
        
        #subContent
        {
            border-style: solid;
            margin:auto;
            background-color: white;
            color: black;
            width: 600px;
        }
        
        hr
        {
            border-style: solid;
            border-width: 2px;
        }
        
        #header1
        {
            font-size: 6rem;
        }
        
        #logoutB
        {
            /*font-size: 50px;*/
        }
    </style>
    
    
    
    
<body>
    
    
<!--CONTAINER#######################################################################################################
####################################################################################################################
####################################################################################################################-->
<div id='container'>
    <?php
        require 'header.php';
    ?>
    <div id="content"> <!-- Begin Content -->
            <div id='title'><strong><font size="6">Contact</font></strong>
            </div>
        
            <hr>
        <div id='subContent'>
            <br>
            <p style="color:black;"><strong>Phone Number:</strong> (555)-5555-5555; Mike Manson</p>
            <p style="color:black;"><strong>E-Mail:</strong> MikeM@example.com</p>
            <p style="color:black;"><strong>Fax:</strong> (555)-5555-5555; Mike Manson</p>	
        </div>
    </div> <!-- End Content -->
</div>
    
    
    
    
    <!--scripts-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>
<!--HTML ends-->