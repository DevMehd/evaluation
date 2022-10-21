<?php
$dsn = 'mysql:host=localhost;dbname=library;charset=utf8';
$userofdb = 'root';
$passwordofdb = 'root';
// $redirect_uri = 'https://mehdikit.000webhostapp.com/login';
// $login_uri = 'https://discord.com/api/oauth2/authorize?client_id=965615535981211648&redirect_uri=https%3A%2F%2Fmehdikit.000webhostapp.com%2Flogin&response_type=code&scope=identify%20email%20guilds';

try {
	$dbh = new PDO($dsn, $userofdb, $passwordofdb);
} catch (PDOException $e) {
	print_r(
		array (
			"ERROR" => $e->getMessage()
		)
	);
	die();
};
$dbh = new PDO($dsn, $userofdb, $passwordofdb); 
?>