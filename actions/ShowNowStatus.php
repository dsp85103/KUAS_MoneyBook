<?php 

	function ShowNowStatus($status) {
		
		switch($status) {
			case "register_successful":
				$statusmsg = "成功註冊！ 3 秒後重新整理網頁！";
				echo "<meta http-equiv=refresh content='3;url=index.php?action=book'>";
				break;

			case "logout":
				session_destroy();
				$statusmsg = "登出成功！ 3 秒後重新整理網頁！";
				echo "<meta http-equiv=refresh content='3;url=index.php?action=homepage'>";
				break;

			case "updatepassword":
				session_destroy();
				$statusmsg = "修改密碼成功！ 3 秒後重新整理網頁！請使用新密碼重新登入";
				echo "<meta http-equiv=refresh content='3;url=index.php?action=login'>";
				break;

			case "deletembook_successful":
				$statusmsg = "刪除成功！ 3 秒後重新整理網頁！";
				echo "<meta http-equiv=refresh content='3;url=index.php?action=book'>";
				break;

			default:
				
				break;
		}
		
		$content = <<<EOT
			<img src="images/successful.png" class="successful">
			<div class="successful_info">$statusmsg</div>
EOT;
		return $content;
	}



?>