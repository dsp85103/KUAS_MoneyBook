<?php

	function DoRegisterAccount($std_uid,$std_name,$pwd) {
		include_once "include/mysql.inc.php";
		try {
			$conn = openDB();
			$income = 0;
			$expend = 0;
			$mbook = "mbook_".$std_uid;
			$cmd = "INSERT INTO `money_account` (uid,name,pwd,mbook,income,expend) VALUES (?,?,?,?,?,?)";
			$count = $conn->prepare($cmd);
			$count->execute(array($std_uid,$std_name,$pwd,$mbook,$income,$expend));

			$msg = "註冊失敗，請稍後在試"; //預設訊息
			if($count) {

				//建立使用者的資料表
				include_once "DoCreateRegisterAccountDBTable.php";
				$msg = DoCreateRegisterAccountDBTable($std_uid);

				if($msg){
					
					//註冊成功
					return true;

				} else {
					$msg = "帳號註冊失敗，請稍後在試 error:01";
				}
			}
		} catch (PDOExpection $e) {
			echo  $e;
		}
		return $msg;
	}



?>