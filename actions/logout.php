<?php

	function logout() {

		include_once "ShowNowStatus.php";
		$content = ShowNowStatus("logout");
		return $content;
		
	}


?>