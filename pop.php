<!DOCTYPE HTML>
<?php 
 $quantity=$_POST["quantity"];
 $cost=$_POST["cost"];

 define('quantity', 20);
 define('cost', 200);


?>


<html>
<head>
<meta charset="utf-8">
<title>Calculate</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>

<body>
</body>


<?php
$quantity=0;
$cost=0;

 echo "order processed at";

 echo "Today is " . date("Y/m/d") . "<br>";

$total=0;
$total = $quantity + $cost;

echo "total items ordered by today";

echo $quantity ."quantity</br>";
echo $cost     ."cost</br>";


$sub_total = $quantity * $cost;
echo "$total. </br>";
echo "sub_total" . $total . "</br>";

$total=0.0;


?>
