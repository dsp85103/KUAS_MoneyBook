<?php
	include_once "include/mysql.inc.php";

	/* 比對資料庫，確認是否有此帳號 */
	function DoCheckLoginUserExist($std_uid,$pwd) { 
		try {
			$conn = openDB();
			$cmd = "SELECT `uid`,`pwd` FROM `money_account`";
			$ans = $conn->query($cmd);
			foreach ($ans as $data) {
				if($std_uid==$data[0] && $pwd==$data[1]) {
					return true;
				}
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return false;
	}

?>