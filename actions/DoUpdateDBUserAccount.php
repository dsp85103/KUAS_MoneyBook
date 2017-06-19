<?php

	function DoUpdateDBUserAccount($loginuser,$behavior,$update_data) {

		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$cmd = "UPDATE `money_account` SET $behavior=? WHERE uid=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($update_data,$loginuser));

			$msg = "修改失敗，請稍後在試";
			if($stat) {
				//修改成功
				return true;
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;

	}

?>