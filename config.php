<?php
	$databaseHost = 'localhost';
	$databaseName = 'test';
	$databaseUsername = 'root';
	$databasePassword = '';

	try {
		$options[PDO::MYSQL_ATTR_LOCAL_INFILE] = true;
		$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword, $options);
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>