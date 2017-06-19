<?php
	
	function accounting_expend() {

		include_once "accounting.php";
		$accounting_table = accounting_table("expend");

		return $accounting_table;
	}

?>