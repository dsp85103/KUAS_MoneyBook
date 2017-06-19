<?php

	function book() {
		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();

		if(!$msg) {

			header("Location: index.php?action=homepage");
			exit;

		} else {

			$loginuser = $_SESSION['loginuser'];

			include_once "ShowUserAccountMoney.php";
			$usermoney = ShowUserAccountMoney($loginuser);

			include_once "ShowUserMbookList.php";
			$usermbooklist = ShowUserMbookList($loginuser);
			if($usermbooklist==null) {
				$usermbooklist = "<tr class=\"mbook-table-list-content\"><td colspan=7>無</td></tr>";
			}
			$body = <<<EOT
				<div class="accounting_bottom" onclick="location.href=
'index.php?action=accounting'"><i class="material-icons">add</i></div>
				<div class="mbook">
					<table class="main-font-family mbook-table">
						<tr class="mbook-table-title">
							<td>收入</td><td>支出</td><td>總額</td>
						</tr>
						<tr class="mbook-table-content">

							$usermoney

						</tr>
					</table>
					
					<form action="index.php?action=accounting" method="post">
						<table class="main-font-family mbook-table-list">
							<tr class="mbook-table-list-title">
								<td>日期</td><td>資產</td><td>行為</td><td>種類</td><td>說明</td><td>金額</td><td>其他</td>
							</tr>
							

								$usermbooklist

							</tr>
						</table>
					</form>
				</div>
EOT;

		}
		return $body;
	}


?>