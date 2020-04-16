<?php session_start();?>
<?php 
//session_start();
if(!isset($_SESSION['name'])){

  $_SESSION['msg']= "you must login first ";
  header("location: index.php");

}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['name']);
  header("location: index.php");
}
?>

<?php include 'header.php';?>
<?php include 'nav2.php';?> 
<center>
  <style>
    body{
        background-color: lavender;
    }
  </style>
<div>
<?php require_once 'server.php';?>
    <?php $mysqli = new mysqli('localhost','root','', 'bill') 
        or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM items")
        or die(mysqli_error($mysqli));
        //print_r($result); 
        ?>
        
        <div class="container">
          <form id="myform">
        <table class="table table-bordered"  style="width:700px;"> 
        <thead>
             <th>Sno:</th>
             <th>Item:</th>
             <th>Cost:</th>
             <th>Action:</th>
       </thead> 
        

        <?php
        $sql="SELECT * FROM items";
        $result=mysqli_query($mysqli,$sql);
        ?>

        <?php
        $i=1;
      
        while ($row=$result->fetch_assoc()):?>        
          <tr>
            <td><?php echo $i; ?></td>
            <?php $i++; ?>

            <td id="id1"><?php echo $row['item'];?>
            </td>
            <td id="id2"><?php echo $row['cost'];?>
            </td>
            <td><a href="userback.php?add=<?php echo $row['id'];?>"><button class="btn btn-info" onclick="myfunc(this.id)">ADD</a></button>
            </td>
          </tr> 

          <?php endwhile; ?>
        </table>
    </div>
  </form>
      
<table class="table table-bordered"  style="width:700px;">
  <thead>
    <tr>
      <th>Item</th>
      <th>cost</th>
      <th>Action</th>
    </tr>
  </thead>
     <tbody>
  <tr>
    <td></td>
    <td></td>
    <td colspan="2">TOTAL:</td>
  </tr>

  </tbody>

</table>
 
    <button  style="float:center;" class="btn btn-primary" type="submit" name="submit" style="width:100px";>SUBMIT</button>
    
</center> 
<script>
  
 $('#myform').submit(function(e) {
        //e.preventDefault();
        // var data = new FormData(this); 
        var a = $('#id1').val();
        var b = $('#id2').val();
        //console.log(a,b);
        $.ajax({
            url: 'ajax1.php',
            data: {'item':item,'cost':cost},
            type: 'POST',
            success: function(data) {
            console.log(data);
            }
        });
    });
   
   function myfunc
   {
    alert("item is selected");
   }
 
 </script>

<?php include 'footer.php';?>  


 