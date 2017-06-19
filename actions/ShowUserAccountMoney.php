<?php

	function ShowUserAccountMoney($loginuser) {

		include_once "DoGetDBUserAccount.php";
		$income = DoGetDBUserAccount($loginuser,"income");
		$expend = DoGetDBUserAccount($loginuser,"expend");
		$total  = $income - $expend;

		$msg = "<td>".$income."</td><td>".$expend."</td><td>".$total."</td>";

		return $msg;

	}

?>