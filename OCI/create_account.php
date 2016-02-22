<?php

/********* edit hmtl file and insert account.php ****/

// connects to the databases

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );



//define variables

$username= mysql_real_escape_string($_GET("username"));
$password= mysql_real_escape_string($_GET("password"));
$new_user= $mysql_real_escape_string(_GET("new_user"));
$email= mysql_real_escape_string($_GET("email"));
$new_password= mysql_real_escape_string($_GET("new_password"));
$check_password= mysql_real_escape_string($_GET("check_password"));


//if new account: save input into database & create session ids

		//encrypt password when saving it into db


//authenticate existing input with database credentials & create session ids







?>
