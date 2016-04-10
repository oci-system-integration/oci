<?php

//connect to db

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );


include( "checkout.php");

if(isset($_GET["finalize"])){

$ivn= hexdec( uniqid());


// if uniqid hasn't been used then insert the uniqid assigned into invoice number


$lookup_ivn= "select * from Invoice where Invoice_Number= '$ivn'";

$ivn_query= mysql_query($lookup_ivn);


	//generate new uniqid

	if( mysql_num_rows ($lookup_ivn != 0)){

			$ivn= hexdec(uniqid());

	}



	$save_invoice= "insert into Invoice values ('$ivn', '$order_num', 1 )";

	($run= mysql_query($save_invoice) ) or die (mysql_error());

}

	//when finalized button is clicked save invoice number, order number, and invoice_status of 1 for processing


?>
