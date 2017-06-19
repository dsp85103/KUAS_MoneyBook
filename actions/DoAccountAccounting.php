<?php

	function DoAccountAccounting($loginuser,$behavior,$spenddate,$assets,$class,$des,$money) {

		$date_array = preg_split('/-/', $spenddate);
		$year = $date_array[0];
		$month = $date_array[1];
		$day = $date_array[2];
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$user_mbook = "mbook_".$loginuser;
			$cmd = "INSERT INTO `$user_mbook` (year,month,day,behavior,assets,class,des,money) VALUES (?,?,?,?,?,?,?,?)";
			$count = $conn->prepare($cmd);
			$count->execute(array($year,$month,$day,$behavior,$assets,$class,$des,$money));

			$msg = "新增失敗，請稍後再試";
			if($count) {
				
				include_once "DoGetDBUserAccount.php";
				include_once "DoUpdateDBUserAccount.php";

				if($behavior=="支出") {
					DoUpdateDBUserAccount(
						$loginuser,
						"expend",
						DoGetDBUserAccount($loginuser,"expend")+$money
					);
				} else if($behavior=="收入") {
					DoUpdateDBUserAccount(
						$loginuser,
						"income",
						DoGetDBUserAccount($loginuser,"income")+$money
					);
				}
				
				//記帳成功直接回記帳簿(book)
				header("Location: index.php?action=book");
				exit;
			} else {
				$msg = "記帳失敗，請稍後在試";
			}

		} catch (PDOExpection $e) {
			echo $e;
		}

		return $msg;
	}
?>