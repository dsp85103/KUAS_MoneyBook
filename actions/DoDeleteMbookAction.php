<?php 

	function DoDeleteMbookAction() {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$loginuser = $_SESSION['loginuser'];

			include_once "DoGetDBUserMbook.php";
			$mbookmoney = DoGetDBUserMbook($loginuser,$id,"money");
			$mbookbehavior = DoGetDBUserMbook($loginuser,$id,"behavior");

			include_once "DoUpdateDBUserAccount.php";
			include_once "DoGetDBUserAccount.php";

			if($mbookbehavior=="支出") {
				DoUpdateDBUserAccount(
					$loginuser,
					"expend",
					DoGetDBUserAccount($loginuser,"expend") - $mbookmoney
				);
			} else if($mbookbehavior=="收入") {
				DoUpdateDBUserAccount(
					$loginuser,
					"income",
					DoGetDBUserAccount($loginuser,"income") - $mbookmoney
				);
			}

			include_once "include/mysql.inc.php";
			$mbook = "mbook_".$loginuser;

			try {
				$conn = openDB();
				$cmd = "DELETE FROM `$mbook` WHERE `_id`=?";
				$stat = $conn->prepare($cmd);
				$stat->execute(array($id));
				if($stat) {
					include_once "ShowNowStatus.php";
					$msg = ShowNowStatus("deletembook_successful");
				}
			} catch (PDOExpection $e) {
				echo $e;
			}
		} else {
			$msg =  <<<EOT
				<div class="errormsg main-font-family">刪除錯誤，請稍後在試</div>
EOT;
		}
		return $msg;
	}


 ?>