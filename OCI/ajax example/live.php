<?php
	$stuff = $_GET['name'];
	
	echo $stuff;
	echo '<br>test<br>';

	try{
		$DBH = new PDO("mysql:host=localhost;dbname=limo", 'root', 'bleach');


		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$STH = $DBH->query('SELECT * FROM airport');
 		$query = 'SELECT * FROM airport';
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		echo $row['airport'];

//		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

		# Filter through rows and echo desired information
		while ($row = mysql_fetch_object($result)) {
    			echo $row->name;
		}
	}catch(PDOException $e) {
		echo $e->getMessage();
	}
	echo '<br>complete';
?>
