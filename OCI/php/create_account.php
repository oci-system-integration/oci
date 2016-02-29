<?php

// connects to the databases

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );



//define variables

$e_email= mysql_real_escape_string($_GET["e_email"]);
$password= mysql_real_escape_string($_GET["password"]);

$n_email= mysql_real_escape_string($_GET["n_email"]);
$new_password= mysql_real_escape_string($_GET["new_password"]);
$check_password= mysql_real_escape_string($_GET["check_password"]);

echo $n_email;


//define cases

$case= 0;
//default case

//if all new user fields are filled in mark this as case 1

if( !empty($n_email) && !empty($new_password)){

	$pwdcheck= " select * from Account where Email= '$n_mail'";
	$query= mysql_query($pwdcheck);

	//make sure password enter in form match

	 if( $new_password != $check_password){
		 die("Passwords provided do not match");
	 }

	 else{

			//confirm that table Account table only consists of email password and account type
		  $case= 1;

			//make sure that before we attmept to insert any info into the table that this user doesn't already exist

			if( mysql_num_rows($query) != 0){

				die("This user already has an account! ");
			}

			else{

					//create sql query to run

					$insert= "insert into Account values ('$n_email' , sha1('$new_password' ), 1 )";
					echo "Case 2 success";

			}


	 }


}



// if the exisiting user fields are filled mark this as case 2

elseif( !empty($e_email) && !empty($password)){

	$case= 2;
	$account_match= " select * from Account where Email= '$e_email' and Password= '$password'";
	echo "Case 2 success";

}


//if create a new acct button was clicked and new usr info
 //filled out then insert data into table otherwise check to
//  see that exisitings user credentials match



	if( isset($_GET["create"]) && ($case === 1)){

		($run= mysql_query($insert) ) or die (mysql_error());

		echo "Case 1 is working";

	}

	//authenticate existing input with database credentials & create session ids

	elseif(isset($_GET['login']) && ($case == 2)){

		($run= mysql_query($account_match)) or die (mysql_error());

		echo "Case 2 is working";

	}

//else (for instances when incomplete info or wrong button clicked, kill connection)

	else{

		die( "Bad input");
	}









?>
