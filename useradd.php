<?php include 'nav1.php';?>
<?php include 'header.php';?>
	
 <style>   
body{
    background-image: url("images/p.jpg");
   
}
</style>

		<?php require_once 'server.php';?>
		<?php $mysqli = new mysqli('localhost','root','', 'bill') 
        or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM user ORDER BY name ASC" )
        or die(mysqli_error($mysqli));
        //print_r($result); 
        ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <div class="container">
        <table class="table table-striped"> 
        <thead>
            <th>Sno:</th>
             <th>Name:</th>
            <th>Password:</th>
            <td colspan="2">action</td>
        </thead> 
        

              <?php
              $i=1;
              while ($row=$result->fetch_assoc()):?>          
            <tr>
                <td><?php echo $i;?>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['pass'];?></td>
                <td><a href="useradd.php?edit=<?php echo $row['id'];?>">edit
                </td> 
                <td><a href="server.php?delete=<?php echo $row['id'];?>">delete 
                </td>
                <?php $i++; ?> 
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    

  <center>

    </div>
    <div class="col-sm-4">
    <form action="server.php" method="POST">
      <input type="hidden" name="id"  value="<?php echo $id; ?>"><br>
            <label>Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" style="width: 300px";><br>
            <label>Password:</label>
            <input type="text" class="form-control" name="pass" value="<?php echo $pass; ?>" style="width: 300px";><br>
       
            <?php if($update == true):?>
            <button type="submit" name="update_user" class="btn btn-primary">updatepassword</button>
            <?php else: ?>

             <button type="submit" name="save_user"  class="btn btn-primary">SAVE</button>
            <?php endif; ?> 

    </form>
  </div>
  </center>
</div>
</div>
</div>
        
    
<?php include 'footer.php';?>