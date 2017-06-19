<?php
	// 檢查註冊輸入資料格式
	function DoCheckRegisterDataFormat($std_name,$std_uid,$pwd,$confirm_pwd) {
		if($std_name != null && $std_uid != null && $pwd != null && $confirm_pwd != null) {
			if(!preg_match("/^[0-9]+$/",$std_uid)) {
				$msg = "學號包含不法字元";
			} else if($pwd!=$confirm_pwd) {
				$msg = "密碼兩次不一致";
			} else if(!substr($std_uid, 0,7)) {
				$msg = "學號錯誤，不符合KUAS格式";
			} else {
				return "format_checked";
			}
		} else if ($std_name == null) {
			$msg = "姓名不得為空";
		} else if ($std_uid == null) {
			$msg = "學號不得為空";
		} else if ($pwd==null || $confirm_pwd==null) {
			$msg = "密碼不得為空";
		} 
		return $msg;
	}
?>