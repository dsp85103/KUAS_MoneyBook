<?php 

	function DoCreateRegisterAccountDBTable($std_uid) {
		$mbook = "mbook_".$std_uid;
		try {
			$conn = openDB();
			$cmd = "CREATE TABLE `s1105137124`.`$mbook` ( `_id` INT NOT NULL AUTO_INCREMENT ,  `year` INT NOT NULL , `month` INT NOT NULL , `day` INT NOT NULL , `behavior` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, `assets` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, `class` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `des` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `money` INT NOT NULL , PRIMARY KEY (`_id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_unicode_ci;";
			$count = $conn->query($cmd);
			if($count) {
				return true;
			}
		} catch (PDOExpection $e) {
			echo $e;
		}
		return false;
	}



?>