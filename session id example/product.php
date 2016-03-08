<!DOCTYPE html>
<html>
<body>

<?php
$code= $_GET['code'];
include('account.php');
$STH = $DBH->query("SELECT * FROM Inventory WHERE Item_Code = $code");
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
if($row = $STH->fetch()){
		$name = $row['Item_Name'];
		$desc = $row['Item_Description'];
		$quant = $row['OnHand_Quantity'];
		$price = '$' . $row['Price'];
}else{
		echo 'server error, product does not exist';
		exit;
}

 ?>

<Div Class="Header">
</Div>

<style>
.Header
{
	width:100%;
	height:130px;
	background-size:cover;
	position: fixed;
}

.info
{
	text-align: left;
	position: relative;
	left: 450px;
	top: 300px;
}

#pic1
{
	width:400px;
	height:250px;
}

#pic2
{
	width:250px;
	height:250px;
}

#pic3
{
	width:250px;
	height:250px;
}

#pic4
{
	width:250px;
	height:250px;
}
</style>

<div class = "info">
<h1> <?php echo $name; ?> </h1>

<h3> <?php echo $desc; ?> </h3>

<h2> Image Here </h2>

<p> Quantity left: </p>
<p> <?php echo $quant; ?> </p>

<p> Price: </p>
<p> <?php echo $price; ?> </p>
</div>

<img src="1.jpg" id="pic1" >

<h3> Recommendations based on preferences </h3>

<img src="2.jpg" id="pic2">
<img src="3.jpg" id="pic3">
<img src="4.jpg" id="pic4">

<?php echo 'current product code: ' . $code; ?>
</body>
</html>
