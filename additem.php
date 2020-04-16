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
<?php include 'nav1.php';?>
<style>
body{
	background-image: url("images/l.jpg");
}
form{
  padding-top: 20px;
}

</style>

<center>
   
<div class="container">
  <h2>Enter Items</h2>
   <div class="card" style="width:400px">
    <div class="card-body">
      
    <form action="server.php" method="POST">
      <label>Item:</label>
      <input type="text" class="form-control" required placeholder="Enter Item" name="item" style="width:300px";>&nbsp &nbsp
      <label >Cost:</label>
      <input type="text" class="form-control" required placeholder="Enter Cost" name="cost" style="width:300px";><br>
      <button class="btn btn-primary" type="submit" name="add" style="width:100px";>ADD</button>
    </form>
      
    </div>
  </div>
</div>


 
</center>
</div>







