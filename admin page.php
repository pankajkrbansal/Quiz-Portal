<?php

session_start();



////////////////




///////////////



$con= mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));

$save_msg="";


//save details
if(isset($_POST['save'])){

		$quiz_name= $_POST['quiz_name'];
		$quiz_duration= $_POST['quiz_duration'];
		$negative_mark= $_POST['negative_mark'];


		$insert_save_query= "insert into quiz_details(quiz_name, quiz_duration, negative_mark) values('$quiz_name', '$quiz_duration','$negative_mark')";

		$insert= mysqli_query($con, $insert_save_query) or die(mysqli_error($con));

		$save_msg=" Details are saved! ";

}

// upload file
$error="";
$success="";

		if(isset($_POST['upload_ques'])){
				$file = $_FILES['file'];

			$file_name = $_FILES['file']['name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$file_tem_name = $_FILES['file']['tmp_name']; 
			$file_error = $_FILES['file']['error'];
			$file_store = "upload/".$file_name; 

				if(move_uploaded_file($file_tem_name, $file_store)){
			        $success="Question File get Uploaded.";
			        }
			    else{
			        $error="File format not supported! <br>";
			    } 
		}



		$error2="";
$success2="";

		if(isset($_POST['upload_ans'])){
				$file = $_FILES['file'];

			$file_name = $_FILES['file']['name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$file_tem_name = $_FILES['file']['tmp_name']; 
			$file_error = $_FILES['file']['error'];
			$file_store = "upload/".$file_name; 

				if(move_uploaded_file($file_tem_name, $file_store)){
			        $success2="Answer File get Uploaded.";
			        }
			    else{
			        $error2="File format not supported! <br>";
			    } 
		}
			?>





<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Create Quiz</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
  


<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Create Quiz</h1> </div>



    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>

	<div class="jumbotron" style="height:950px">
	<div id="adminheader">Admin Quiz Creation</div>

	<center>
        <b><h3 style="font-weight: bold;"> Admin ID:- <?php echo $_SESSION['admin_id'] ?>   </h3></b>
    </center>
 
     <form action="?saved" method="post">

     		<div id="row1" class="row">
			      <div class="col-45">
			        <label >Quiz Name</label>
			      </div>
			     
			      <div class="col-55">
			        <input type="text" name="quiz_name" required="true">
			      </div>

			    </div>

			    <div id="row1" class="row">
			      <div class="col-45">
			        <label>Quiz Duration</label>
			      </div>
			     
			      <div class="col-55">
			        <input style="width: 40%;" type="number" name="quiz_duration" required="true">
			      </div>

			      <div class="min">
			      	*(in minutes)
			      </div>
			    </div>


			    <div id="row1" class="row">
			      <div class="col-45">
			        <label >Negative Marking</label>
			      </div>
			     
			      <div class="col-55">
			      	<pre style="width: 40%;"><input type="radio"  name="negative_mark" value="1" >enable    <input type="radio"  name="negative_mark" value="0" checked>disable</pre>
			      </div>

			    </div>

			     <center>
    
           <b><h4 style="color: green; font-weight: bold;" class="success_save"><?php echo $save_msg; ?></h4	></b>
         </center>


			    <center>
			    <div class="row">
		         <input id="browse" type="submit" value="Save" name="save">
		      </div>
		  	</center>

			    
	</form>   


	<form action="?ques_uploaded" method="post" enctype="multipart/form-data"> 
		    
		    <div id="row1" class="row">
			      
			      <div class="col-45">
			        <label >Upload Question File</label>
			      </div>
			     
			      <div class="col-55" style="margin-top:20px; ">
			        <input type="file" name="file" required="true">
			      </div>

			    </div>
		    

		    <center>


		    <div class="row">
		         <input id="browse" type="submit" value="Upload" name="upload_ques">
		      </div>
		  	</center>

		  	<!-- error show upload--> 
           <center>
           <b><h3 class="error_login"><?php echo $error; ?></h3></b>
           <b><h3 style="color: green; font-weight: bold;" class="error_login"><?php echo $success; ?></h3></b>
         </center>

    </form>

    <form action="?ans_updated" method="post" enctype="multipart/form-data"> 
		    
		    <div id="row1" class="row">
			      
			      <div class="col-45">
			        <label >Upload Answer File</label>
			      </div>
			     
			      <div class="col-55" style="margin-top:20px; ">
			        <input type="file" name="file" required="true">
			      </div>

			    </div>
		    

		    <center>


		    <div class="row">
		         <input id="browse" type="submit" value="Upload" name="upload_ans">
		      </div>
		  	</center>

		  	<!-- error show upload--> 
           <center>
           <b><h3 class="error_login"><?php echo $error2; ?></h3></b>
           <b><h3 style="color: green; font-weight: bold;" class="error_login"><?php echo $success2; ?></h3></b>
         </center>

    </form>


	 <form action="user_text_newcopy.php" method="post">
			 	 <div class="row" style="margin:50px 0 0 -260px;">
			      <input class="generate" value="Generate Quiz" type="submit" name="submit">
			    </div>
	 </form>



	


 </div> 
</div>

<footer class="panel-footer">
    <div class="container-fluid">
      <div class="text-center"></div>
    </div>
</footer>
 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>