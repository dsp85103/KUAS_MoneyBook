<?php
	
	function DoGetUserMbookAction($loginuser) {

		$mbook = "mbook_".$loginuser;
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$user_mbook = "mbook_".$loginuser;
			$cmd = "SELECT * FROM `$mbook` ORDER BY `_id` ASC";
			$stat = $conn->query($cmd);
			$msg = $stat->fetchAll();
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;

	}


?>