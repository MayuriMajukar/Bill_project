<?php
session_start();
    $errors = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
        $db = mysqli_connect('localhost', 'root', '', 'bill') or die("could not connect to database");
        $myusername = mysqli_real_escape_string($db,$_POST['name']);
        $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
        
        
	 	$sql1 = "SELECT * FROM user WHERE name = '$myusername' ";
	 	$result1 = mysqli_query($db,$sql1);
		$row1 = mysqli_fetch_array($result1);
		$count1 = mysqli_num_rows($result1);
		if($count1 == 1){


			 $sql = "SELECT * FROM user WHERE name = '$myusername' and pass = '$mypassword'";
		        $result = mysqli_query($db,$sql);
		        $row = mysqli_fetch_array($result);
		        $uname = $row['name'];
		      	
		        $count = mysqli_num_rows($result);
		 
		        if($count == 1) {
		            $_SESSION['name'] = $uname;
		
		            $_SESSION['success'] = "login succesfull";
		            header("location: userdash.php");
		        }else {
		            array_push($errors, " Your Password is incorrect");
		            $_SESSION['error'] = $errors;
		            header("location: userlogin.php");
		        }

		}
		else{

		            array_push($errors, " Your Username is incorrect");
		            $_SESSION['error'] = $errors;
		            header("location: userlogin.php");

		}
		 

   }


   if(isset($_GET['logout'])) {
		session_destroy();
		header("location: index.php");
   }
		
		
?>














		       