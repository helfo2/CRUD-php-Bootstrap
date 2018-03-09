<?php
	// database name
	define('DB_NAME', 'wdacrud');

	// database user
	define('DB_USER', 'root');

	// database password
	define('DB_PASSWORD', 'taquim_2503');

	// database host
	define('DB_HOST', 'localhost');

	if(!defined('ABSPATH'))
		define('ABSPATH', dirname(__FILE__).'/');
	// server root 
	if(!defined('BASEURL'))
		define('BASEURL', '/crud-bootstrap/');

	// database file
	if(!defined('DBAPI'))
		define('DBAPI', ABSPATH.'inc/database.php');

	define('HEADER_TEMPLATE', ABSPATH.'inc/header.php');
	define('FOOTER_TEMPLATE', ABSPATH.'inc/footer.php');
?>