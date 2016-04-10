<?php

/********* edit hmtl file and insert account.php ****/

// connects to the databases

include (  "dbcreds.php"     ) ;

/*
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );
*/
try {

  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$hostname;dbname=$project", $username, $password);

}
catch(PDOException $e) {
    echo $e->getMessage();
}
echo 'successfully connected <br>';
//real example
/*
# values in the select statement.
$STH = $DBH->query('SELECT * FROM Inventory');
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
while($row = $STH->fetch()) {
    echo $row['Item_Code'] . "<br>";
    echo $row['Item_Name'] . "<br>";
    echo $row['Item_Description'] . "<br>";
}
*/


//website resource: http://code.tutsplus.com/tutorials/why-you-should-be-using-phps-pdo-for-database-access--net-12059
//define variables


//if new account: save input into database & create session ids

		//encrypt password when saving it into db


//authenticate existing input with database credentials & create session ids







?>
