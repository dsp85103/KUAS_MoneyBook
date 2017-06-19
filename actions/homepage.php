<?php
	function homepage() {

		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) { //收到true表示現在是登入狀態

			$loginuser = $_SESSION['loginuser'];
			header("Location: index.php?action=book");
			exit;

		} else {

			$body =  <<<EOT
				<div class="main-font-family welcomemsg">
					<marquee scrollamount="15" behavior="alternate">歡迎使用KUAS線上記帳系統！<font color="red">完全免費！</font></marquee>
				</div>
				<div class="description main-font-family">
					註冊很安全，記帳很簡單<br>
					1. 填寫 KUAS 學號 <br>
					2. 設定密碼<br>
					3. 開始記帳<br>

					<div class="index-pic">
					PICTURE
					</div>
				</div>
				<div class="free-register-section">
					  <a href="index.php?action=register" class="main-font-family free-register-btn button button-block button-rounded button-primary button-large" style="font-weight: bold;">免費註冊</a>
				</div>
EOT;
			return $body;
			
		}
	}


?>