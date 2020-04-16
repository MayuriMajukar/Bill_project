<?php
session_start();
    $errors = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
        $db = mysqli_connect('localhost', 'root', '', 'bill') or die("could not connect to database");
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        
	 	$sql1 = "SELECT * FROM admin WHERE username = '$myusername' ";
	 	$result1 = mysqli_query($db,$sql1);
		$row1 = mysqli_fetch_array($result1);
		$count1 = mysqli_num_rows($result1);
		if($count1 == 1){


			 $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
		        $result = mysqli_query($db,$sql);
		        $row = mysqli_fetch_array($result);
		        $uname = $row['username'];
		      	
		        $count = mysqli_num_rows($result);
		 
		        if($count == 1) {
		            $_SESSION['username'] = $uname;
		            $_SESSION['success'] = "login succesfull";
		            header("location: admindash.php");
		        }else {
		            array_push($errors, " Your Password is incorrect");
		            $_SESSION['error'] = $errors;
		            header("location: adminlogin.php");
		        }

		}
		else{

		            array_push($errors, " Your Username is incorrect");
		            $_SESSION['error'] = $errors;
		            header("location: adminlogin.php");

		}
		 

   }


   if(isset($_GET['logout'])) {
		session_destroy();
		header("location: index.php");
   }
		
		
?>








