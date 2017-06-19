<?php

	function ShowAccountProfileContent($uid) {

		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$cmd  = "SELECT `uid`,`name`,`income`,`expend` FROM `money_account` WHERE uid=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($uid));

			if($stat) {
				$result = $stat->fetchAll();
				foreach ($result as $data) {
					$msg['name'] = $data['name'];
					$msg['uid'] = $data['uid'];
					$msg['total_assets'] = "NT$".number_format($data['income']-$data['expend']); //5000000 to 5,000,000
				}
			}
		} catch (PDOExpection $e) {
			echo $e;
		}

		return $msg;
	}

?>