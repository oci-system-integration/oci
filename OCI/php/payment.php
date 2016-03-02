<?php

//connect to db

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );

//define html form variables

$name= mysql_real_escape_string($_GET['name']);

$card_num= mysql_real_escape_string($_GET['card_num']);

$month= mysql_real_escape_string($_GET['month']);

$year= mysql_real_escape_string($_GET['year']);

$cvc= mysql_real_escape_string($_GET['cvc']);

//save payment info into db

if(isset($_GET["finalize"])){

	//theres no table for payment ... 

	$save= "insert into"

}

?>
