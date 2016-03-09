<?php

/* Checkout saves customer shipping information and shipping type into Customer
and Shipping tables */

//connect to db

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );




//define shipping info variables from html form

$shiptype= mysql_real_escape_string($_GET["shiptype"]);

$customer_name= mysql_real_escape_string($_GET["first_name"]);

$customer_name.= " ";

$customer_name.= mysql_real_escape_string($_GET["last_name"]);

$street1= mysql_real_escape_string($_GET["address_1"]);

$street2= mysql_real_escape_string($_GET["address_2"]);

$city= mysql_real_escape_string($_GET["city"]);

$zip= mysql_real_escape_string($_GET["zip"]);

$state= mysql_real_escape_string($_GET["state"]);

$country= mysql_real_escape_string($_GET["country"]);

$phone_number= mysql_real_escape_string($_GET["phone"]);

//include ______ to define $total amount

include("cart.php");

$total= $price * $quantity;

// include create account to get email of user

include("create_account.php");

//check if user is new or exisiting

if( $e_email== ""){

	$email= $n_email;
}

else{

	$email= $e_email;
}

//save input into db


if( isset($_GET["pay"])){

	//customer id

  $cid= hexdec(uniqid());
	//make sure customer id is unique

	$lookup_customer= "select * from Customer where Customer_ID= '$cid'";

	$customer_query= mysql_query($lookup_customer);

	while( mysql_num_rows($lookup_customer != 0)){

		$cid= hexdec(uniqid());

	}

	//shipment id

	$shipid= hexdec(uniqid());

	//make sure shipment id is unique

	$lookup_shipment= "select * from Shipment where Shipment_IDv= '$shipid'";

	$ship_query= mysql_query($lookup_shipment);

	while( mysql_num_rows($lookup_shipment !=0)){

		$shipid= hexdec(uniqid());

	}


	//order number

	$order_num= hexdec( uniqid());

	//make sure order num is unique

	$lookup_order_num= "select * from Invoice where Order_Number= '$order_num'";

	$order_num_query= mysql_query($lookup_order_num);


	while( mysql_num_rows($lookup_order_num !=0)){

		$order_num= hexdec(uniqid());

	}


	$save_customer_info= " insert into Customer values('$cid', '$customer_name', '$phone_number', '$email', '$street1', '$street2', '$city', '$state', '$country', '$zip' )";

	$save_ship_info= " insert into Shipment values( '$shipid' , '$order_num', '$shiptype' )";

	$save_order= " insert into Order values ('$order_num', '$cid', NOW(), '$total', 1 )";
}



?>
