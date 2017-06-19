<?php 

	function openDB() {

		//定義連線mysql參數
		$db_host = 'db.mis.kuas.edu.tw';
		$db_name = 's1105137124';
		$db_user = 's1105137124';
		$db_pwd = 'Skills39';

		//建立mysql連線
		$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
		$conn = new PDO($dsn,$db_user,$db_pwd);
		return $conn;
	}
	
?>