<?php

	function DoAccountingAction() {
		$behavior = @$_POST['behavior'];
		$spenddate = @$_POST['spenddate'];
		$assets = @$_POST['assets'];
		$des = @$_POST['des'];
		$money = @$_POST['money'];
		$class = @$_POST['class'];
		
		include_once "DoCheckAccountingDataFormat.php";
		$msg = DoCheckAccountingDataFormat($behavior,$spenddate,$assets,$class,$money);

		if($msg=="format_checked") {

			if(empty($des)) {
				$des = "無";
			}
			if(isset($_SESSION['loginuser'])) {
				$loginuser = $_SESSION['loginuser'];
				include_once "DoAccountAccounting.php";
				$msg = DoAccountAccounting($loginuser,$behavior,$spenddate,$assets,$class,$des,$money);
			} else {
				//目前沒有登入使用者 跳回首頁
				header("Location: index.php?action=homepage");
				exit;
			}

		}

		include_once "accounting.php";
		return AccountingErrorMsg($behavior,$msg);
	}

?>