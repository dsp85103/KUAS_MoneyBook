<?php 

	$errormsg = "";

	function RegisterErrorMsg($msg) {
		global $errormsg;
		$errormsg = $msg;
		return register();
	}

	function register() {
		global $errormsg;
		
		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) {   //收到true表示現在是登入狀態，直接跳轉

			$loginuser = $_SESSION['loginuser'];
			header("Location: index.php?action=book");
			exit;

		} else {

			$std_uid = @$_POST['std_uid'];
			$std_name = @$_POST['std_name'];
			
			$content = <<<EOT
			<div class="register-section main-font-family">
				<font size="6">註冊</font>
				<form action="index.php?action=DoRegisterAction" method="POST">
					<table class="registertable">
						<tr>
							<td class="registeritem">姓名：</td><td><input class="inputtext" type="text" name="std_name" value="$std_name"></td>
						</tr>
						<tr>
							<td class="registeritem">學號：</td><td><input class="inputtext" type="number" name="std_uid" value="$std_uid"></td>
						</tr>
						<tr>
							<td class="registeritem">密碼：</td><td><input class="inputtext" type="password" name="pwd" maxlength="10"></td>
						</tr>
						<tr>
							<td class="registeritem">確認密碼：</td><td><input class="inputtext" type="password" name="confirm_pwd" maxlength="10"></td>
						</tr>
					</table>
					<div class="errormsg main-font-family">$errormsg</div>
					<input type="submit" value="註冊" class="main-font-family register-btn button button-block button-rounded button-primary button-large" style="font-weight: bold;">
				</form>
			</div>
EOT;
			return $content;

		}
	}


?>