<?php 

	$errormsg = "";

	function LoginErrorMsg($msg) {
		global $errormsg;
		$errormsg = $msg;
		return login();
	}

	function login() {
		global $errormsg;

		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) {   //收到true表示現在是登入狀態，直接跳轉

			$loginuser = $_SESSION['loginuser'];
			header("Location: index.php?action=book");
			exit;

		} else {
			$std_uid = @$_POST['std_uid'];
			$pwd = @$_POST['pwd'];

			$content = <<<EOT
				<div class="login-section main-font-family">
					<font size="6">登入</font>
					<form action="index.php?action=DoLoginAction" method="POST">
						<table class="logintable">
							<tr>
								<td class="loginitem">學號：</td><td><input class="inputtext" type="number" name="std_uid" value="$std_uid"></td>
							</tr>
							<tr>
								<td class="loginitem">密碼：</td><td><input class="inputtext" type="password" name="pwd" maxlength="10"></td>
							</tr>
						</table>
						<div class="errormsg main-font-family">$errormsg</div>
						<input type="submit" value="登入" class="main-font-family login-btn button button-block button-rounded button-primary button-large" style="font-weight: bold;">
					</form>
				</div>
				<?php

				 ?>
EOT;
			return $content;
		}
	}

?>