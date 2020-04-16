<?php 
session_start();
if(!isset($_SESSION['username'])){

  $_SESSION['msg']= "you must login first ";
  header("location: index.php");

}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
?>

<?php include 'header.php';?>
<?php include 'nav1.php';?>
<style>
	body{
		background-image: url("images/t.jpg");
	}
	.t{
		padding: 200px;
	}
</style>

<center>
  <h1  class="t" style="color:black;">WELCOME ADMIN</h1>
</center>


<?php include 'footer.php';?>