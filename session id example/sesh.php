<?php

session_start();

$_SESSION['test'] = rand();
echo $_SESSION['test'];
echo '<br><a href=\'seshout.php\'>link to other page showing cached data</a>';

?>