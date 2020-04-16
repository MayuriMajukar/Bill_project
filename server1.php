<?php $mysqli = new mysqli('localhost','root','', 'bill') 
 or die(mysqli_error($mysqli));


$update=false;
$id=0;
//admin
if(isset($_GET['delete']))
{

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM items WHERE id=$id")
	or die($mysqli->error());
	header("location: items.php");
}



if(isset($_GET['edit1']))
{   $id=$_GET['edit1'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM items WHERE id=$id")or die($mysqli->error());
    if(count($result)==1){
    	$row = $result->fetch_array();
    	$item = $row['item'];
    	$cost = $row['cost'];
    }
    //header("location: items.php");
}



if(isset($_POST['update'])){
	$id=$_POST['id'];
	$item=$_POST['item'];
	$cost=$_POST['cost'];
	$mysqli->query("UPDATE items SET item='$item',cost='$cost' WHERE id=$id") or
	 die(mysqli_error($mysqli));
	header("location: items.php");
}
?>
