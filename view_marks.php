
<?php 

session_start();
	
	$con= mysqli_connect("localhost", "root", "", "quiz") or die(mysqli_error($con));

	$select_marks= "select enroll_no, marks from quiz_marks";

	$select_marks_result= mysqli_query($con, $select_marks) or die(mysqli_error($con));


?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Students Marks</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Marks</h1> </div>

    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>
    
	<div class="jumbotron" style="height:auto;">

	<center>
        <b><h3 style="font-weight: bold;"> Admin ID:- <?php echo $_SESSION['admin_id'] ?>   </h3></b>
    </center>


	<h3><b><u>Enrollment No.</u>
	&nbsp; &nbsp; &nbsp; &nbsp; 	&nbsp; &nbsp; <span><u> Marks </u></span>
</b>
	 </h3>


	 <?php while($row = mysqli_fetch_array($select_marks_result)) {

	 	$enroll_no= $row['enroll_no'];

	 	$marks= $row['marks'];

	 	?>

	 	<h4> <?php echo $enroll_no ?>
	&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<span> <?php echo $marks ?> </span>

	 </h4>
	 
	 <hr>

<?php } ?>
	



</body>
</html>