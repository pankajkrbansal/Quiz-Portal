<?php

session_start();


$select_duration="";
$select_duration_result="";
$row="";


$con= mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));



$select_duration= "select quiz_name, quiz_duration from quiz_details";

  $select_duration_result= mysqli_query($con, $select_duration) or die(mysqli_error($con));

  $row = mysqli_fetch_array($select_duration_result);

  $time1=$row['quiz_duration'];

  $total_time= 60* $time1;



?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Quiz Question</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>
<body>


<div id="main-content" class="container">
    <br>
    <div id="portalname">

    	 <center>
        <b><h3 style="font-weight: bold;"> Enrollment No:- <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
    </center>

      <h1 style="padding-bottom: 10px;"><u>

         <?php echo $row['quiz_name']  ?> Quiz  
            <br> <br> </u></h1>

     <h2>  Questions</h2> </div>
    <br>
    
<div class="time_show" id="quiz-time-left" >
	
    <script>
      var total_seconds = <?php echo $total_time ?>;

      var c_minutes = parseInt(total_seconds/60);
      var c_seconds = parseInt(total_seconds%60);

      function CheckTime() {
        document.getElementById("quiz-time-left").innerHTML = 'Time Left: ' + c_minutes + ' minutes ' + c_seconds + ' seconds ';
        if(total_seconds<=0){


          window.location= 'result_page.php';
        } 



        else{
          total_seconds=total_seconds-1;
          c_minutes = parseInt(total_seconds/60);
          c_seconds = parseInt(total_seconds%60);
          setTimeout("CheckTime()",1000);
        }}

      setTimeout("CheckTime()",1000);
    </script>
</div>

    <div class="jumbotron" style="height:auto;">

<?php
//THE FILE IS FETCHING DATA FROM DATABASE.


       $con=mysql_connect('localhost','root','') or die("could not connect to mysql");
       $my_db=mysql_select_db("quiz") or die("no database");
	   
       //require 'C:\xampp\htdocs\PROJECT\user_text_newcopy.php';
	   
	    /*$sql="SELECT * FROM questions";
	    $result=mysqli_query($con,$sql);
	    $sizeq=mysqli_num_rows($result);
	    echo "$sizeq";*/


		?>
		<form method="POST" action="result_page.php">
		<?php
		for($i=1;$i<6;$i++)
		{
			$q="SELECT * FROM questions where qid=$i";
			$query=mysql_query($q);
			
			   while($rows=mysql_fetch_array($query))
			   {
				    echo trim($rows['question']);
					echo "?";
				    echo "<br> <br> ";

				    $ansq="SELECT * FROM answers where ans_id=$i";
					$ans_q=mysql_query($ansq);
					   while($ans_rows=mysql_fetch_array($ans_q))
					   {
						   ?>
						   <input type="radio" name="check[<?php echo $ans_rows['ans_id']; ?>]" value="<?php echo $ans_rows['aid']?>">
						     <?php 
						          echo $ans_rows['answer'];
						          echo "<br> <br>";
							  ?>
						   
						   
						   <?php
					   }
			   }
			   echo "<br><br>";
		}
		   
	    ?>
	          <input style="float: right;" type="submit" name="submit" value="Submit">
	   
	        </form>
			 <?php

?> 

<br><br><br><br>

</div>
</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>