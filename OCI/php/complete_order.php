<?php

// connect to db

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );

//retrieve order details in a table

include ("payment.php");

$retrieve=" select * from Order Details where Order_Number= '$order_num'";

$run= mysql_query($retrieve);

while( $r= mysql_fetch_array($run)){

  $item_code= $r["Item_Code"];
  $item_quantity= $r["Item_Quantity"];

}

//display info on browser

//worry about styling later

echo $order_num ." <br></br>" . $item_code ."<br></br>" . $item_quanity;




//





 ?>
