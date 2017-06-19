<?php

	function deletembook() {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];

			$loginuser = $_SESSION['loginuser'];
			include_once "DoGetUserIdMbookAction.php";
			$data = DoGetUserIdMbookAction($loginuser,$id);

			$content = <<<EOT
				<table class="main-font-family mbook-table">
					<tr class="mbook-table-title">
						<td>日期</td>
						<td>資產</td>
						<td>行為</td>
						<td>種類</td>
						<td>說明</td>
						<td>金額</td>
					</tr>
					<tr class="mbook-table-content">
						<td>$data[year]-$data[month]-$data[day]</td>
						<td>$data[assets]</td>
						<td>$data[behavior]</td>
						<td>$data[class]</td>
						<td>$data[des]</td>
						<td>$data[money]</td>
					</tr>
				</table>
				<div class="errormsg main-font-family">是否刪除？</div>
				<div class="delmbook-btn-div">
					<label class="main-font-family delmbook-btn button button-rounded button-primary button-large" onclick="location.href='index.php?action=DoDeleteMbookAction&id=$data[_id]'">是</label>  <label class="main-font-family delmbook-btn button button-rounded button-primary button-large" onclick="location.href='index.php?action=book'">否</label>

				</div>
				
EOT;
		} else {
			$content = <<<EOT
				<div class="errormsg main-font-family">刪除錯誤，請稍後在試</div>
EOT;
		}
		return $content;
	}



?>