<?php 


	function DoCheckRegisterAccountRepeat($std_uid) {
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$cmd = "SELECT `uid` FROM `money_account`";
			foreach ($conn->query($cmd) as $uid) {
				if($std_uid==$uid[0]) {
					return false;  //資料庫內有重複uid
				}
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return true; 
	}


?>