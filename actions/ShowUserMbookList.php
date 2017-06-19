<?php

	function ShowUserMbookList($loginuser) {

		include_once "DoGetUserMbookAction.php";
		$result = DoGetUserMbookAction($loginuser);

		$msg = "";
		foreach($result as $data) {
			$date = $data['year']."-".$data['month']."-".$data['day'];
			$msg .= <<<EOT
				<tr class="mbook-table-list-content">
					<td>$date</td>
					<td>$data[assets]</td>
					<td>$data[behavior]</td>
					<td>$data[class]</td>
					<td>$data[des]</td>
					<td>$data[money]</td>
					<td><label class="main-font-family mbookaction-btn button button-rounded button-primary" onclick="location.href='index.php?action=editmbook&id=$data[_id]'">修改</label>
						<label class="main-font-family mbookaction-btn button button-rounded button-primary" onclick="location.href='index.php?action=deletembook&id=$data[_id]'">刪除</label>
					</td>
				</tr>
EOT;
		}

		return $msg;

	}

?>