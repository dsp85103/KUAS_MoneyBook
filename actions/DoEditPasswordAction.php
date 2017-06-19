<?php

	function DoEditPasswordAction() {
		$ori_pwd = @$_POST['ori_pwd'];
		$new_pwd = @$_POST['new_pwd'];
		$new_confirm_pwd = @$_POST['new_confirm_pwd'];

		include_once "DoCheckEditPwdDataFormat.php";
		$msg = DoCheckEditPwdDataFormat($ori_pwd,$new_pwd,$new_confirm_pwd);

		if($msg=="format_checked") {
			if(isset($_SESSION['loginuser'])) {
				$loginuser = $_SESSION['loginuser'];

				include_once "DoGetDBUserAccount.php";
				$msg = DoGetDBUserAccount($loginuser,"pwd");

				if($ori_pwd==$msg) {
					include_once "DoUpdateDBUserAccount.php";
					$msg = DoUpdateDBUserAccount($loginuser,"pwd",$new_pwd);

					if($msg) {

						//修改密碼成功
						include_once "ShowNowStatus.php";
						return ShowNowStatus("updatepassword");
						
					} else {
						$msg = "修改密碼失敗，請稍後在試";
					}

				} else {
					$msg = "舊密碼輸入錯誤";
				}
			}
		}
		
		include_once "editpassword.php";
		return EditPasswordErrorMsg($msg);
	}

?>