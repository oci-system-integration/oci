<?php


echo 'cart<br>';
include('account_new.php');
$customer='85235';

if($_GET['request']=='Update'){
	$quant = $_GET['quantity'];
	$todelete = $_GET['item'];
	
	
	$sql = "UPDATE Cart SET Quantity=$quant WHERE Customer_ID=$customer";

    // Prepare statement
    $stmt = $DBH->prepare($sql);
    // execute the query
    $stmt->execute();
	header( 'Location: ../html/Cart_HTML.html' ) ;
}
if($_GET['request']=='Delete'){
	$todelete = $_GET['item'];
	echo 'delete<br>';
	echo $todelete;
	//header( 'Location: ../html/Cart_HTML.html' ) ;
	$sql = "DELETE FROM Cart WHERE Item_Code=$todelete AND Customer_ID=$customer";

    // Prepare statement
    $stmt = $DBH->prepare($sql);
    // execute the query
    $stmt->execute();
	header( 'Location: ../html/Cart_HTML.html' ) ;
}
if($_GET['request']=='Buy'){
	$quant = $_GET['quantity'];
	$code = $_GET['item'];
	
	$stmt = $DBH->prepare("SELECT * FROM Cart WHERE Customer_ID=$customer AND Item_Code=$code");
	$stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if( ! $row){

		$sql = "INSERT INTO Cart (Customer_ID,Quantity,Item_Code) VALUES ($customer,$quant,$code)";
		// Execute statement
		$DBH->exec($sql);
	}
	header( 'Location: ../html/Cart_HTML.html' ) ;
}



$STH = $DBH->query("SELECT Cart.Quantity, Cart.Item_Code, Inventory.Item_Name, Inventory.Price FROM Cart INNER JOIN Inventory ON Cart.Item_Code=Inventory.Item_Code WHERE Customer_ID = $customer");


echo '<br>';
echo "<table><tr><th></th><th></th><tr/>";

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
while($row = $STH->fetch()){
	echo '<tr>';
	$quant = $row['Quantity'];
	$code = $row['Item_Code'];
	$name = $row['Item_Name'];
	$price = $row['Price'];
	echo "<td><img src=\"../html/images/Products/$code.png\" id=\"pic1\" ><a href=\"product.php?code=$code\">$name</a>";
	echo "<br>Product code: $code</td>";
	echo "<td>";
	echo "<form action=\"../php/cart.php\">";
	echo '$' . $price . " x ";
    echo "<input type=\"number\" name=\"quantity\" value=\"$quant\" id=\"quantity\">
  <input type=\"hidden\" name=\"item\" value=\"$code\">
  <input type=\"submit\" name=\"request\" value=\"Update\">
</form>";
	echo '<br>$' . $price * $quant;
	echo "<form action=\"../php/cart.php\">
  <input type=\"hidden\" name=\"item\" value=\"$code\">
  <input type=\"submit\" name=\"request\" value=\"Delete\"></form>";
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
echo '<br>complete';
?>