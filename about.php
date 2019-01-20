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
        
        #container
        {
            height: 1100px;
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
            width: 700px;
            font-size: 17px;
        }
        
        #subContent
        {
            border-style: solid;
            margin:auto;
            background-color: white;
            width: 600px;
            padding: 20px;
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

    <div id="content"> <!-- Start ABOUT Content -->
        <div id='title'><strong><font size="6">About Us</font></strong>
        </div>
        
            <hr><br>
        <div id="subContent">
            <br>
            <p style="color:black;"><strong>MISSION:</strong> Investing in our community by providing counseling and support services to assist children and families in reaching their fullest potential.</p>
            <p style="color:black;"><strong>VISION:</strong> Building on over 66 years of excellence, our vision is to improve the lives of children and families by offering a full range of comprehensive, state of the art behavioral health services.  We will engage in research and training programs to support continuous learning and improved treatment outcomes, while deepening collaborative partnerships to contribute to a thriving community.</p>
            <p style="color:black;">Since 1951, the <strong>Child Guidance Center</strong> has specialized in helping children, adolescents and their families cope with the stresses of life. Our staff of more than 120 professionals are committed to meeting your needs.</p>
            <p style="color:black;">Our staff of trained professionals can help.</p>
        
            <p style="color:black;">CGC is a fee-based agency and accepts payment for services rendered. For insurance eligibility, please call.</p>
            <p style="color:black;">Child Guidance Center is a private, not-for-profit organization. CGC is 
            grateful for the financial support provided by Florida's Department of Children 
            and Families, the City of Jacksonville, Jacksonville Children's Commission, 
            United Way of Northeast Florida, Family Support Services of North Florida, Inc., 
            Lutheran Services Florida, and the many individuals who have generously given to 
            the Center.</p>					
            
    </div> <!-- End ABOUT Content -->
</div>
    
    
    
    
    <!--scripts-->
    <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>
<!--HTML ends-->