<?php 

	function DoUpdateDBUserMbookList($loginuser,$id,$behavior,$spenddate,$assets,$class,$des,$money) {

		include_once "include/mysql.inc.php";
		$mbook = "mbook_".$loginuser;
		$date_array = preg_split('/-/', $spenddate);
		$year = $date_array[0];
		$month = $date_array[1];
		$day = $date_array[2];

		include_once "DoGetDBUserAccount.php";
		include_once "DoGetDBUserMbook.php";
		include_once "DoUpdateDBUserAccount.php";
		$ori_money = DoGetDBUserMbook($loginuser,$id,"money");
		$ori_behavior = DoGetDBUserMbook($loginuser,$id,"behavior");

		//由於行為被我鎖住了，所以只會有同類型的修改金錢
		$content = ($behavior=="收入")?"income":"expend";
		DoUpdateDBUserAccount(
			$loginuser,
			$content,
			DoGetDBUserAccount($loginuser,$content) - ($ori_money - $money)
		);
		

		if($des==null) {
			$des="無";
		}
		try {
			$conn = openDB();
			$cmd = "UPDATE `$mbook` SET year=?,month=?,day=?,behavior=?,assets=?,class=?,des=?,money=? WHERE `_id`=?";
			$stat = $conn->prepare($cmd);
			$stat->execute(array($year,$month,$day,$behavior,$assets,$class,$des,$money,$id));

			$msg = "儲存失敗，請稍後在試";
			if($stat) {
				
				//儲存成功
				header("Location: index.php?action=book");
				exit;
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return $msg;
	}



?>