<?php 

	function DoGetDBUserAccount($loginuser,$action) {

		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$cmd = "SELECT `$action` FROM `money_account` WHERE uid=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($loginuser));
			if($stat) {
				$result = $stat->fetchAll();
				$msg =  $result[0][0];
			} else {
				$msg =  "get_account_error";
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;

	}




?>