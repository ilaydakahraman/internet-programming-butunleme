<?php 

session_start();
//Veritabanı bağlantısını burada yaptım.
$user="root";
$password="";
$db="tasimacilik";

$dsn = "mysql:host=localhost;dbname=$db;charset=UTF8";

try {
	$db = new PDO($dsn, $user, $password);

	if ($db) {
		//echo "Veritabanına başarılı bir şekilde bağlanıldı.";
	}
} catch (PDOException $e) {

	echo $e->getMessage();
}


?>