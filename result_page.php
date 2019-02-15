<?php 

session_start();
	
	$con= mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));

$select_negative= "select negative_mark from quiz_details";

  $select_negative_result= mysqli_query($con, $select_negative) or die(mysqli_error($con));

  $row = mysqli_fetch_array($select_negative_result);


 $negative= $row['negative_mark'];


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Quiz Result </title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
        
	<div id="main-content" class="container">
    <br>

    <center>
        <b><h3 style="font-weight: bold;"> Enrollment No:- <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
    </center>

    <div id="portalname"><h1 style="padding-bottom: 10px;"> Result</h1> </div>
    
    <br>

    <div class="jumbotron" style="height:300px">
       

<?php
//THIS FILE CHECKS NO OF Q ATTEMPTED & NO OF CORRECT ANSWERS ALSO.

$count=0;

//


//
error_reporting(0);
       $con=mysql_connect('localhost','root','') or die("could not connect to mysql");
       $my_db=mysql_select_db("quiz") or die("no database");
	       if(isset($_POST['submit']))
		   {

			   if(!empty($_POST['check']))
			   {
				   $result=0;
				   $i=1;
				   $selected = $_POST['check'];
				   $count = count($_POST['check']);

				   ?>

				    <center><h3> Test is over you attempted <?php echo $count ?> questions </h3></center>
				   
				    <?php 

				   $query="SELECT * FROM questions";
				   $fire_query=mysql_query($query);
				       while($rows = mysql_fetch_array($fire_query))
					   {	
					   	 
						   //$checked = $rows['ans_id'] == $selected[$i];

						   	if($negative==0){
						   			if($rows['ans_id'] == $selected[$i])
								  {
									  $result++;
								  }
								  $i++;

						    	}

							   	else  
							   	{
								      if($rows['ans_id'] == $selected[$i])
									  {
										  $result++;
									  }
									  else if($selected[$i]!="" && $rows['ans_id'] != $selected[$i])
									  {
										  $result--;
									  }
									  $i++;
							     }
					   }
					   ?>

					    <center><h3><b><br> Marks Scored: &nbsp; <?php echo $result ?> </b> </h3></center>

					    <?php 

			   }

			   else{

			   	$result=0;
			   	

			   	?>


			   	 <center><h3> Test is over you attempted <?php echo $count ?> questions </h3></center>
			   	  <center><h3><b><br> Marks Scored: &nbsp; <?php echo $result ?> </b> </h3></center>

			   	<?php

			   }



		   }


		   $_SESSION['res']=$result;
?>

<?php
	
    
    $er= $_SESSION['enroll_no'];
    $res= $_SESSION['res'];
    
    if(isset($_POST['submit'])){
        $con= mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));


        $insert_marks= "insert into quiz_marks(enroll_no, marks) values('$er', '$res')";

        $insert_marks_result= mysqli_query($con, $insert_marks) or die(mysqli_error($con));

    }


?>

</div>
</div>

<div class="a">

<center>
    <h3>Thank You! </h3>
</center>
</div>


<form action="index.php" method="post">
			<div class="row" style="margin:50px 0 0 225px;">
		        <input id="logout" type="submit" value="Logout" name="log_out"> 
		    </div>
	</form>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>