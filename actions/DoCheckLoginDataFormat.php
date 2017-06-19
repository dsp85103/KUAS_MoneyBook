<?php
	// 檢查登入資料格式
	function DoCheckLoginDataFormat($std_uid,$pwd) {
		$msg = "";
		if($std_uid != null && $pwd != null ) {
			if(!preg_match("/^[0-9]+$/",$std_uid)) {
				$msg = "學號包含不法字元";
			} else {
				//格式檢查通過
				return "format_checked"; 						
			}
		} else if ($std_uid==null && $pwd!=null) {
			$msg = "學號不得為空";
		} else if ($std_uid!=null && $pwd==null) {
			$msg = "密碼不得為空";
		}
		return $msg;
	}
?>