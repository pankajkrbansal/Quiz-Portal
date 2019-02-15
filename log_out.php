
<?php
    
    session_start();


?>

            <!DOCTYPE html>
<html>
<head>
    <title>Logged Out</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">

<style >
    .thanku{
    color: black;
    text-align: center;
    font-size: 20px;

}
</style>

</head>
<body>

     <center>
        <b><h3 style="font-weight: bold;"> Enrollment No:- <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
    </center>

    
    <div class="thanku">
        <h1 style="color: green;">Your are successfully logged out!</h1> 

        <br> 
        <h1 style="color: black;">Close the Tab! </h1>
     
</div>    
    
   

   <?php

   session_unset();
   session_destroy();

   ?>

</body>
</html>