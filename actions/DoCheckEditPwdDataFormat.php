<?php

	function DoCheckEditPwdDataFormat($ori_pwd,$new_pwd,$new_confirm_pwd) {
		if(!empty($ori_pwd) && !empty($new_pwd) && !empty($new_confirm_pwd)) {

			if($new_pwd!=$new_confirm_pwd) {
				$msg = "兩次輸入的新密碼不一致！";
			} else {
				return "format_checked";
			}

		} else if(empty($ori_pwd)) {
			$msg = "舊密碼不得為空！";
		} else if(empty($new_pwd)) {
			$msg = "新密碼不得為空！";
		} else if(empty($new_confirm_pwd)) {
			$msg = "確認密碼不得為空！";
		} 
		return $msg;
	}

?>