
<?php require_once 'server.php';?>
    <?php $mysqli = new mysqli('localhost','root','', 'bill') 
        or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM items")
        or die(mysqli_error($mysqli));
        //print_r($result); 
        ?>

<html>
 <head>
  <title>How to Use Ajax PHP to Append Last Inserted Data to HTML Tables | Using AJAX to append database rows to HTML tables</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <h2 align="center">How to Use Ajax PHP to Append Last Inserted Data to HTML Tables</h2><br />
   <h3 align="center">Add Details</h3>
   <br />
   <form method="post" id="add_details">
    <div class="form-group">
     <label>Item</label>
     <input type="text" name="item" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Cost</label>
     <input type="text" name="cost" class="form-control" required />
    </div>
    <div class="form-group">
     <input type="submit" name="add" id="add" class="btn btn-success" value="Add" />
    </div>
   </form>
   <br />
   <h3 align="center">View Details</h3>
   <br />
   <table class="table table-striped table-bordered">
    <thead>
     <tr>
      <th>Item</th>
      <th>Cost</th>
     </tr>
    </thead>
    <tbody id="table_data">
    <?php
    foreach($result as $row)
    {
     echo '
     <tr>
      <td>'.$row["item"].'</td>
      <td>'.$row["cost"].'</td>
     </tr>
     ';
    }
    ?>
    </tbody>
   </table>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"ajax1.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.first_name)
    {
     var html = '<tr>';
     html += '<td>'+data.item+'</td>';
     html += '<td>'+data.cost+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});
</script>
