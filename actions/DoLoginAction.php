<?php 

	/* 登入動作 */
	function DoLoginAction() {
		$std_uid = @$_POST['std_uid'];
		$pwd = @$_POST['pwd'];

		include_once 'DoCheckLoginDataFormat.php';
		$msg = DoCheckLoginDataFormat($std_uid,$pwd);

		if($msg=="format_checked") {
			include_once 'DoCheckLoginUserExist.php';
			$msg = DoCheckLoginUserExist($std_uid,$pwd);

			if($msg) {  //TRUE帳號存在 FALSE帳號不存在
				
				//登入成功
				session_start();
				$_SESSION['loginuser'] = $std_uid;
				header("Location: index.php?action=book");
				exit;

			} else {
				$msg = "學號或密碼錯誤";
			}
		}

		include_once "login.php";
		return LoginErrorMsg($msg);
	}

?>