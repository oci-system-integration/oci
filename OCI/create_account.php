<?php

/********* edit hmtl file and insert account.php ****/

// connects to the databases

include (  "dbcreds.php"     ) ;
( $dbh = mysql_connect( $hostname, $username, $password ) )
	       	or die ( "Unable to connect to MySQL database: " . mysql_error());
print "Connected to MySQL<br>";
mysql_select_db( $project );



//define variables

$e_email= mysql_real_escape_string($_GET("e_email"));
$password= mysql_real_escape_string($_GET("password"));

$n_email= mysql_real_escape_string($_GET("n_email"));
$new_password= mysql_real_escape_string($_GET("new_password"));
$check_password= mysql_real_escape_string($_GET("check_password"));

//define cases

$case= 0;
//default case

//if all new user fields are filled in mark this as case 1

if( !empty($email) && !empty($new_password){

	$pwdcheck= " select * from Account where Email= '$e_mail'";
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

					$insert= "insert into Account values ('$n_email' , '$new_password' , 1 )";

			}


	 }


}

// if the exisiting user fields are filled mark this as case 2

elseif( !empty($e_email) && !empty($password)){

	$case= 2;
	$account_match= " select * from Account where Email= '$e_email' and Password= '$password'";

}


/*if create acct button clicked

	check to see that required new usr, email, new password, and check password info has been given as well as the button being clicked */

	if( isset($_GET("new_user") && ($case == 1)){

		

	}


		//encrypt password when saving it into db


//else if make sure that username, password, and login button was clicked

		//authenticate existing input with database credentials & create session ids

//else (for instances when incomplete info or wrong button clicked, kill connection)











?>
