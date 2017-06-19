<?php
	
	function accounting_income() {

		include_once "accounting.php";
		$accounting_table = accounting_table("income");

		return $accounting_table;
	}

?>