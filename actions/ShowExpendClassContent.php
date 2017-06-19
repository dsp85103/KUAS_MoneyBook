<?php
	
	function ShowExpendClassContent() {
		$class_array =
		 array(	"food"=>"食物",
				"social"=>"社交",
				"personal"=>"個人",
				"traffic"=>"交通",
				"culture"=>"文化",
				"home"=>"家居",
				"apparel"=>"服飾",
				"beauty"=>"美容",
				"health"=>"健康",
				"education"=>"教育",
				"gift"=>"禮物",
				"other"=>"其他" 
			);
		$msg = "";
		foreach ($class_array as $class_index => $class_data) {
			$msg .= <<<EOT
				<input type=radio name=class id="$class_index" value="$class_data"><label class="main-font-family class-btn button button-rounded button-primary button-large" for="$class_index">$class_data</label>
EOT;
		}
		return $msg;
	}

?>