<?php $mysqli = new mysqli('localhost','root','', 'bill') 
 or die(mysqli_error($mysqli));

$update=false;
$name='';
$pass='';
$id=0;
//admin login
/*if(isset($_POST['save']))
{
	    $username = $_POST['username'];
		$password = $_POST['password'];
		$mysqli->query("INSERT INTO admin(username,password)
			VALUES('$username' , '$password')") or
		die($mysqli -> error);
		header("location: nav1.php");
}*/




//user login
if(isset($_POST['log']))
{
	    $name = $_POST['name'];
		$pass = $_POST['pass'];
		$mysqli->query("INSERT INTO user(name,pass)
			VALUES('$name' , '$pass')") or
		die($mysqli -> error);
		header("location: userdash.php");
}





//added items by admin

if(isset($_POST['add']))
{
	    $item= $_POST['item'];
		$cost = $_POST['cost'];
		$mysqli->query("INSERT INTO items(item,cost)
			VALUES('$item' , '$cost')") or
		die($mysqli -> error);
		header("location:additem.php");
}

//fetching id
// if(isset($_GET['add']))
// {   $id=$_GET['add'];
//     $result = $mysqli->query("SELECT * FROM item WHERE id=$id")or 
//     die($mysqli->error());
//     if(count($result)==1){
//     	$row = $result->fetch_array();
//     	$item = $row['item'];
//     	$cost = $row['cost'];
//     }
// }


//useradd

if(isset($_POST['save_user']))
{
	    $name= $_POST['name'];
		$pass = $_POST['pass'];
		$mysqli->query("INSERT INTO user(name,pass)
			VALUES('$name' , '$pass')") or
		die($mysqli -> error);
		header("location:useradd.php");
}


if(isset($_GET['delete']))
{

	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM user WHERE id=$id")
	or die($mysqli->error());
	header("location:useradd.php");
}



if(isset($_GET['edit']))
{   $id=$_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM user WHERE id=$id")or die($mysqli->error());
    if(count($result)==1){
    	$row = $result->fetch_array();
    	$name = $row['name'];
    	$password = $row['pass'];
    }
   //header("location:useradd.php");
}



if(isset($_POST['update_user'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$mysqli->query("UPDATE user SET name='$name',pass='$pass' WHERE id=$id") or
	 die(mysqli_error($mysqli));
	header("location:useradd.php");
}



//userdash 
if(isset($_POST['pass']))
{
	    
		$billno = $_POST['bill_no'];
		$item = $_POST['item'];
		$cost = $_POST['cost'];
		
		$mysqli->query("INSERT INTO bill(bill_no,item,cost)
			VALUES('$billno','$item','$cost')") or
		die($mysqli -> error);
		header("location: userdash.php");
}



//items.php
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




  