<?php

	function DoCheckSessionAuth() {
		@session_start();
		if(isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
			return true;
		} else {
			return false;
		}
	}

?>