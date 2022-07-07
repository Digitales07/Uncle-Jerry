<?php

if(true)
{
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'uncle_jerry');
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
}
else
{
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'frizkoys_unclej');
	define('DB_PASSWORD', 'T3^tHo2R,Q4c');
	define('DB_DATABASE', 'frizkoys_unclejerry');
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
}

define('TYPE_SUBADMIN', 0);
define('TYPE_SUPERADMIN', 1);
?>