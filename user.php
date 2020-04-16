<!--<?php 
session_start();
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
<style>
form{
  padding: 50px;
  
}
body{
  background-color: lavender;
}

</style> 

<center>
<div class="container">
  <form class="form-inline" action="server.php" method="POST">
    <label >Billno:</label>&nbsp &nbsp 
    <input type="text" class="form-control"  name="bill_no">&nbsp &nbsp
    <label>Item:</label>&nbsp &nbsp
    <input type="text" class="form-control"  name="item">&nbsp &nbsp
    <label >Cost:</label>&nbsp &nbsp
    <input type="text" class="form-control"  name="cost">&nbsp &nbsp
    <button class="btn btn-primary" type="submit" name="pass">ADD</button>
  </form>
</div>


<div>
<?php require_once 'server.php';?>
    <?php $mysqli = new mysqli('localhost','root','', 'bill') 
        or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM bill")
        or die(mysqli_error($mysqli));
        //print_r($result); 
        ?>
        
        <div class="container">
        <table class="table table-bordered"> 
        <thead>
             <th>Sno:</th>
             <th>Bill_no</th>
             <th>Item:</th>
             <th>Cost:</th>
       </thead> 
        

        <?php
        $sql="SELECT * FROM bill";
        $result=mysqli_query($mysqli,$sql);
        ?>

        <?php
        $i=1;
      
        while ($row=$result->fetch_assoc()):?>        
          <tr>
            <td><?php echo  $i; ?></td>
            <?php $i++; ?>
            <td><?php echo $row['bill_no'];?></td>
            <td><?php echo $row['item'];?></td>
            <td><?php echo $row['cost'];?></td>
          </tr>
          <?php endwhile; ?>
          
        </table>
    </div>

    
    <label style="padding-top: 10px"; >CalulateTotal:</label>
    <input type="text" class="form-control" class="btn btn-primary" style="width: 200px";><br>
    <button class="btn btn-primary" type="submit">SUBMIT</button></span>
    </div>
  </form>
</center>
<script>
  function get_type(cat) {
    var category = cat;
    $.ajax({
        url: 'ajax.php',
        type: 'GET',
        data: {
          'cat': category
        },
          success: function(response){
            console.log(response);
            $("#item").html(response);
          }
      });
  }



<?php include 'footer.php';?>  
-->