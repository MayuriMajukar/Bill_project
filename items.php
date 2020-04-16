<?php session_start();?>
<?php include 'nav1.php';?>
<?php include 'header.php';?>
    
 <style>   
body{
       background-image: url("images/v.jpg");
    }
</style>

        <?php require_once 'server.php';?>
        <?php $mysqli = new mysqli('localhost','root','', 'bill') 
        or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM items" )
        or die(mysqli_error($mysqli));
        //print_r($result); 
        ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9">
      <div class="container">
        <table class="table table-striped" > 
          <thead>
            <th>Sno:</th>
            <th>items:</th>
            <th>Cost:</th>
            <td colspan="2">action</td>
          </thead> 
        

            <?php
            $i=1;
            while ($row=$result->fetch_assoc()):?>          
            <tr>
                <td><?php echo $i;?>
                <td><?php echo $row['item'];?></td>
                <td><?php echo $row['cost'];?></td>
                <td><a href="items.php?edit1=<?php echo $row['id'];?>">edit
                </td> 
                <td><a href="server.php?delete=<?php echo $row['id'];?>">delete 
                </td>
                <?php $i++; ?> 
            </tr>
                <?php endwhile; ?>
        </table>
    </div>
  </div>
    <div class="col-sm-3">
      <center>
      <form action="server.php" method="POST">
      <input type="hidden" name="id"  value="<?php echo $id; ?>"><br>
            <label>Items:</label>
            <input type="text" class="form-control" name="item" value="<?php echo $row['item']; ?>" style="width: 300px";><br>
            <label>Cost:</label>
            <input type="text" class="form-control" name="cost" value="<?php echo $row['cost']; ?>" style="width: 300px";><br>
       
        
        <?php if($update == true):?>
         <button type="submit" name="update" class="btn btn-primary">NewCost</button>
        <?php else: ?>

        
        <?php endif; ?>

        </form>
    </center>

    </div>
  </div>
</div>
        
