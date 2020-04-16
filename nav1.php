<?php include 'header.php';?>

<?php 
//session_start();
if(!isset($_SESSION['username'])){

  $_SESSION['msg']= "you must login first ";
 //header("location: index.php");

}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
?>


<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="admindash.php">ADMIN</a></li>&nbsp &nbsp
       <li class="active"><a href="additem.php">ADD ITEM</a></li>&nbsp &nbsp &nbsp
        <li class="active"><a href="useradd.php">ADD USER</a></li>&nbsp &nbsp &nbsp
        <li class="active"><a href="items.php">ITEMS</a></li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="userauth.php?logout='1'">logout</a></button>
    </ul>
  </div>
</nav>
        

<?php include 'footer.php';?>