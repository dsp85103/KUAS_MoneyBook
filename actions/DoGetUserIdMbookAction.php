<?php
	
	function DoGetUserIdMbookAction($loginuser,$id) {

		$mbook = "mbook_".$loginuser;
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$user_mbook = "mbook_".$loginuser;
			$cmd = "SELECT * FROM `$mbook` WHERE `_id`=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($id));
			$result =  $stat->fetchAll();
			if($stat) {
				$msg = $result[0];
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;

	}


?>