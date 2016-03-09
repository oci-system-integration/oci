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

//save input into db

//does email need to be a field in customer info?



if( isset($_GET["pay"])){

  $cid= hexdec(uniqid());

  $save= " insert into Customer values('$cid', '$customer_name', '$phone_number', '/////', '$street1', '$street2', '$city', '$state', '$country', '$zip' )";
}



?>
