<?php

	function ShowAssetsContent() {
		$content = <<<EOT
			 <input type="radio" name="assets" id="cash" value="現金"><label class="main-font-family assets-btn button button-rounded button-primary button-large" for="cash">現金</label>
			 <input type="radio" name="assets" id="bank" value="帳戶"><label class="main-font-family assets-btn button button-rounded button-primary button-large" for="bank">帳戶</label>
EOT;
		return $content;
	}



?>