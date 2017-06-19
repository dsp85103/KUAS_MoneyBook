<?php 

	function DoRegisterAction() {
		include_once "include/mysql.inc.php";

		$std_uid = @$_POST['std_uid'];
		$std_name = @$_POST['std_name'];
		$pwd = @$_POST['pwd'];
		$confirm_pwd = @$_POST['confirm_pwd'];

		//檢查註冊輸入格式
		include_once "DoCheckRegisterDataFormat.php";
		$msg = DoCheckRegisterDataFormat($std_name,$std_uid,$pwd,$confirm_pwd);

		if($msg=="format_checked") {

			//確認使用者有沒有重複註冊
			include_once "DoCheckRegisterAccountRepeat.php";
			$msg = DoCheckRegisterAccountRepeat($std_uid);

			if($msg) {  //收到true表示該uid在資料庫中沒有重複
				
				//註冊使用者(同時新增使用者的資料表)
				include_once "DoRegisterAccount.php";
				$msg = DoRegisterAccount($std_uid,$std_name,$pwd);

				if($msg) { //收到true表示註冊成功

					
					$_SESSION['loginuser'] = $std_uid;
					include_once "ShowNowStatus.php";
					return ShowNowStatus("register_successful");
				}

			} else {

				$msg =  $std_uid." 重複註冊";

			}
		}
		include_once "register.php";
		return RegisterErrorMsg($msg);
	}



?>