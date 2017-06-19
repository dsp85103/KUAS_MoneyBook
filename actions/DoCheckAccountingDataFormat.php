<?php

	function DoCheckAccountingDataFormat($behavior,$spenddate,$assets,$class,$money) {
		if(!empty($behavior) && !empty($spenddate) && !empty($assets) && !empty($class) && !empty($money)) {
			
			return "format_checked";
			
		} else if(empty($behavior)) {
			$msg = "行為是必選選項！";
		} else if(empty($spenddate)) {
			$msg = "日期是必選選項！";
		} else if(empty($assets)) {
			$msg = "資產是必選選項！";
		} else if(empty($class)) {
			$msg = "類型是必選選項！";
		} else if(empty($money)) {
			$msg = "現金是必填資料！";
		}
		return $msg;
	}

?>