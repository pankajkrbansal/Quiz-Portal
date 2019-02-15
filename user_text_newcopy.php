
<?php
//echo"I AM ON<br>";
//UPLOADING IN THE DATABASE Q WELL AS ANSWERS IN THE RESPECTIVE TABLES.

$con=mysql_connect('localhost','root','');
$my_db=mysql_select_db("quiz",$con);

if($my_db)
 {
	 //echo "success<br>";
 }
 $target_dir="upload/";
error_reporting(0);
 //echo "<br>Your file<br>";
 
               if($_SERVER['REQUEST_METHOD']=='POST')
			   {
				   //$n=$_POST['filename'];
				   $myfile=fopen("upload/up.txt","r") or die ("File Not Found");
				 $print = fread($myfile,filesize("upload/up.txt"));
				 $Q="";
				 $l1=0;
				 $lent=0;
				 $ans=array();                 				
				$l=0;
				 $subarr="";
				 $myarray="";
				$tempq="";
				 $myArray = explode('.', $print);
				 $l=sizeOf($myArray);
				 //echo "$l";
				 //echo "<br>$l.size of my array<br>";
				 
				 //reading file which contain answers;
				 
				 $myans=fopen("upload/answer.txt","r") or die ("File Not Found");
				 $ansid=fread($myans,filesize("upload/answer.txt"));
				
				 $ansarr="";
                 $ansarr=explode('.',$ansid);
				 //$ansize=sizeof($ansid);
				 $tempa="";
				 //echo "$ansize";
				 $tempa=implode(".",$ansarr);
				 $A="";
				 $A=explode(".",$tempa);
				
               //separating questions & answer.
				
				$tempq=implode("?",$myArray);
               
                $j=0;
				$Q=explode('?',$tempq);
				for($i=0;$i<$l*2;$i++)
				   {			
				     //echo "<br>q = $Q[$i] . $i <br><br>";
					 if($i%2!=0)
					 {
						 $ans[$j]=$Q[$i];
						 $j++;
						 $Q[$i]="";
					 }
				   }
				
			



			//cretaing a separate string for questions which is finally having Q.
				$copyq="";
				$copyans="";
				$lq="";
				$j=0;
				$lans=sizeof($ans);
			    $lq=sizeof($Q);
				//echo "lq = $lq<br>lans =$lans<br>";
				for($i=0;$i<$lq;$i++)
				{
				        if($Q[$i]!="")
						{
					           $copyq[$j]=$Q[$i];
                                  $j++;							   
						}							
				
				}
				
				
				
				
				//creating separate options.
				
				$op=array();
				$final_ans=array();
				$copyans="";
				
				$copyans=implode(",",$ans);
				$final_ans=explode(",",$copyans);
				//echo "finalans = $final_ans<br>";
				$finalans_len=sizeof($final_ans);
				

				
				$c=0;
				$count=0;
				$lim=4;
				$j=0;
				//echo sizeof($copyq);
				$query="";
				$p=1;
				$namec=1;
				$count1=1;
				//printing final statement.
				for($i=0;$i<sizeof($copyq);$i++)
				{
					
					//echo "$copyq[$i]?<br>";
					
					//inserting Q into database quizdb one by one
					
					
					$query="insert into questions values ('$p','$copyq[$i]','$A[$i]')";
					$res=mysql_query($query)or die("f");
				
				
                        $j=$count;
                    if($count<$finalans_len && $lim<=$finalans_len)
					{				
                           //  echo "inside<br>";				
					  for($j=$count;$j<$lim;$j++)
				      {
						?>  
						
						
						     
						     <?php 
                                  $c++;
							//$namec++;	 
                              							  
					  }
						  
						  $count=$c;
						  						  $lim=$lim+4;
						  echo"<br>";
						 
					}
                            $p++;					
							
							$count1++;
							
				}
				
				
				//trying for uploading anwers here
				$lim=4;
				$count=0;
				$c=0;
				$j=0;
				$qry="";
				$pc=1;
				$namea=1;
				for($i=0;$i<sizeof($copyq);$i++)
				{
					//echo "<br>Enter next loop<br>";
					
                        $j=$count;
                    if($count<$finalans_len && $lim<=$finalans_len)
					{				
                           //  echo "inside<br>";				
					  for($j=$count;$j<$lim;$j++)
				      {
						 // echo "<br>Executing";
					         $qry="insert into answers values ('$pc','$final_ans[$j]','$namea')";
						     $res1=mysql_query($qry) or die ("fail");	  
						     //here is the place to insert query for answers in the database.
						
						     
                                  $c++;
								  $pc++;
							//$namec++;	 
                              							  
					  }
						  $namea++;
						  $count=$c;
						  						  $lim=$lim+4;
						  echo"<br>";
						 
					}
                        //    $p++;					
							
							//$count1++;
							
				}
				
			   }
   ?>

<?php
    
    session_start();

?>

<html>
<head>

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
        <b><h3 style="font-weight: bold;"> Admin ID:- <?php echo $_SESSION['admin_id'] ?>   </h3></b>
    </center>

    
    <div class="thanku">
        <h1 style="color: green;">Quiz successfully get Generated!</h1>

        <br> 
        <h1 style="color: black;">Click on Log out! </h1>
     
        <div id="adminpage" class="row">
            <a href="./index.php">
              <span>Log out</span>  
            </a>
            </div>
</div>    
    


</body>
</html>