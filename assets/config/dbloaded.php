<?php
@include('config.php');
try{	
	@$conn = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, 
  			array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'",
										PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT,
										PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
}catch(PDOException $e){ echo "Error".$e->getMessage(); }
?>