
<?php

session_start();


$select_duration="";
$select_duration_result="";
$row="";




$con= mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));


$select_duration= "select quiz_name, quiz_duration from quiz_details";

  $select_duration_result= mysqli_query($con, $select_duration) or die(mysqli_error($con));

  $row = mysqli_fetch_array($select_duration_result);

  



?>



<!DOCTYPE html>
<html>
<head>
        <title>Quiz Instruction</title>

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE edge">
        <meta name="viewport" content="width=device-width" initial-scale="1"> 

</head>
<body>

    <div class="login_welcome">
        
        <center>
        <b><h3 style="font-weight: bold;"> Welcome! <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
     

        <h3 style="font-weight: bold; color: green;" class="logged"> Logged in Successfully!</h3>
    </center>

</div>    

<div id="main-content" class="container">
    <br>
    <div id="portalname">

        <h2 style="padding-bottom: 10px;"><u> 
            <?php echo $row['quiz_name']  ?> Quiz  
            <br> </u>   </h2>

        <h3> <u>Read the Instructions carefully! </u> </h3> </div>
    <div class="jumbotron" style="height:380px">
 
        <div class="instrucions">

            <h4> <b> <u>Instructions</u>:- </b></h3>
                <br>
            <ol>
                <li> Total questions: 5 </li>
                <br>
                <li>
                   Time allotted: 10 minutes 
                </li>

                <br>
                <li>
                    There is negative marking of -1 for each wrong question. 
                </li>
                <br>
                <li>
                    Click on <b>START QUIZ</b> button to start the Quiz. 
                </li>
                <br>
                <li>
                    After Quiz starts, don't press back or refresh button or don't close the browser window. 
                </li>
            </ol>

        </div>
        
</div> 
     <form action="quiz_question.php" method="post">
      <input type="submit" value="START QUIZ" name="submit">
      </form>
</div>


    
   

</body>
</html>