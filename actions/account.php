<?php 

	function account() {

		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) {
			$loginuser = $_SESSION['loginuser'];
			include_once "ShowAccountProfileContent.php";
			$profiledata = ShowAccountProfileContent($loginuser);
			
			$content = <<<EOT
				<div class="main-font-family profile">
					<table class="profile-table">
						<tr>
							<td>姓名</td>
							<td>$profiledata[name]</td>
						</tr>
						<tr>
							<td>學號</td>
							<td>$profiledata[uid]</td>
						</tr>
						<tr>
							<td>總資產</td>
							<td>$profiledata[total_assets]</td>
						</tr>
						<tr>
							<td>密碼</td><td><a href="index.php?action=editpassword" class="main-font-family editpwd-btn button button-block button-rounded button-primary button-large">修改密碼</a></td>
						</tr>
					</table>
				</div>
EOT;
		} else {
			header("Location: index.php?action=homepage");
			exit;
		}
		return $content;
		
	}


?>