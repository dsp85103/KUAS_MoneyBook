<?php
	
	function ShowIncomeClassContent() {
		$class_array =
		 array(	"allowance"=>"津貼",
				"salary"=>"薪金",
				"pocketmoney"=>"零用錢",
				"bonus"=>"紅利",
				"other"=>"其他" );
		 
		$msg = "";
		foreach ($class_array as $class_index => $class_data) {
			$msg .= <<<EOT
				<input type=radio name=class id="$class_index" value="$class_data"><label class="main-font-family class-btn button button-rounded button-primary button-large" for="$class_index">$class_data</label>
EOT;
		}
		return $msg;
	}
?>