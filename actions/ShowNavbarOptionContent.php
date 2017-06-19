<?php 

	function ShowNavbarOptionContent() {

		$loginuser = "";
		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if($msg) {
			$loginuser = $_SESSION['loginuser'];
			$content = <<<EOT
				<div id="nav-area">
					<ul class="nav-option main-font-family">
						<li><a href="index.php?action=book" target="_self" class="nav-url">記帳簿</a></li><li><a href="index.php?action=account" target="_self" class="nav-url">帳戶</a></li><li><a href="index.php?action=developer" target="_self" class="nav-url">關於我們</a></li>
					</ul>
				</div>
				<div id="nav-log-area">
					<ul class="nav-log-option main-font-family">
						<li><a href="index.php?action=account" target="_self" class="nav-url">$loginuser</a></li><li><a href="index.php?action=logout" target="_self" class="nav-url">登出</a></li>
					</ul>
				</div>
EOT;
		} else {
			$content = <<<EOT
				<div id="nav-log-area">
					<ul class="nav-log-option main-font-family">
						<li><a href="index.php?action=login" target="_self" class="nav-url">登入</a></li><li><a href="index.php?action=register" target="_self" class="nav-url">註冊</a></li>
					</ul>
				</div>
EOT;
		}
		return $content;
	}
	



?>