<?php
	
	function DoGetDBUserMbook($loginuser,$id,$parameter) {

		$mbook = "mbook_".$loginuser;
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$user_mbook = "mbook_".$loginuser;
			$cmd = "SELECT `$parameter` FROM `$mbook` WHERE `_id`=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($id));

			if($stat) {
				$result = $stat->fetchAll();
				$msg = $result[0][0];
			}
			
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;

	}


?>