<?php

//connect to db

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );




if(isset($_GET["finalize"])){

$ivn= hexdec( uniqid());
$order_num= hexdec( uniqid());

// if uniqid hasn't been used then insert the uniqid assigned into invoice number

$lookup= " select * from Invoice where Invoice_Number= '$ivn'";
$query= mysql_query($lookup);

while( mysql_num_rows($query) != 0){
	//generate new uniqid
		$ivn= hexdec(uniqid());

		$save= "insert into Invoice values ('$ivn', '$order_num', 1 )";

		($run= mysql_query($save) ) or die (mysql_error());
}




	//when finalized button is clicked save invoice number, order number, and invoice_status of 1 for processing

	//display order details from "order details"



}

?>
