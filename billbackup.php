<?php session_start();?>

<?php include 'header.php';?>
<?php include 'nav2.php';?>
<HEAD>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<style>
  form{
    position: absolute;
    left: 50px;
  }
  body{
    background-color: tomato;
  }


</style>
<div>
 <div class="row">
<div class="col-sm-4">
  <form action="server.php" method="POST">
    <label >Billno:</label>&nbsp &nbsp 
    <input type="text" class="form-control" name="bill_no">&nbsp &nbsp
    <label >Item:</label>&nbsp &nbsp
    <input type="text" class="form-control"  name="item">&nbsp &nbsp
    <label >Cost:</label>&nbsp &nbsp
    <input type="text" class="form-control"  name="cost">&nbsp &nbsp
    <label >Quantity:</label>&nbsp &nbsp 
    <input type="text" class="form-control"  name="quantity"><br>
    <button class="btn btn-success" type="submit" name="pass">ADD TO CART</button>
  </form>
</div>



  <?php

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM bill WHERE bill_no='" . $_GET["bill_no"] . "'");
      $itemArray = array($productByCode[0]["bill_no"]=>array('item'=>$productByCode[0]["item"], 'bill_no'=>$productByCode[0]["bill_no"], 'quantity'=>$_POST["quantity"], 'cost'=>$productByCode[0]["cost"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["bill_no"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["bill_no"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["bill_no"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>
<div class="col-sm-8">
<div id="shopping-cart">
  <a id="btnEmpty" href="userdash.php?action=empty">Empty Cart</a>
<div class="txt-heading">Shopping Cart</div>


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>  
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">item</th>
<th style="text-align:left;">bill_no</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">cost</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["cost"];
    ?>
        <tr>
          <td><?php echo $item["item"]; ?></td>

        <td><?php echo $item["bill_no"]; ?></td>
        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
        <td  style="text-align:right;"><?php echo "Rs. ".$item["cost"]; ?></td>
        <td  style="text-align:right;"><?php echo "Rs. ". number_format($item_price,2); ?></td>
        <td style="text-align:center;"><a href="userdash.php?action=remove&bill_no=<?php echo $item["bill_no"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
        </tr>
        <?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["cost"]*$item["quantity"]);
    }
    ?>



<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rs. ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>

</tbody>
</table>    
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
</div>
</div>
</div>




<?php include 'footer.php';?>  


