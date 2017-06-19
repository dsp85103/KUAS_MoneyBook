<?php 
	
	$errormsg = "";

	function EditPasswordErrorMsg($msg) {
		global $errormsg;
		$errormsg = $msg;
		return editpassword();
	}

	function editpassword() {
		
		global $errormsg;
		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) {

			$content = <<<EOT
				<div class="register-section main-font-family">
					<font size="6">修改密碼</font>
					<form action="index.php?action=DoEditPasswordAction" method="POST">
						<table class="editpwdtable">
							<tr>
								<td class="editpwditem">舊密碼：</td><td><input class="editpwdinputtext" type="password" name="ori_pwd" value=""></td>
							</tr>
							<tr>
								<td class="editpwditem">新密碼：</td><td><input class="editpwdinputtext" type="password" name="new_pwd" maxlength="10"></td>
							</tr>
							<tr>
								<td class="editpwditem">確認密碼：</td><td><input class="editpwdinputtext" type="password" name="new_confirm_pwd" maxlength="10"></td>
							</tr>
						</table>
						<div class="errormsg main-font-family">$errormsg</div>
						<input type="submit" value="修改" class="main-font-family editpwd-editbtn button button-block button-rounded button-primary button-large">
					</form>
				</div>
EOT;
			return $content;
		} else {
			header("Location: index.php?action=homepage");
			exit;
		}
	}

?>