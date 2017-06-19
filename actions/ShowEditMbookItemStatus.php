<?php

	function ShowEditMbookExpendClass($class) {
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
		$msg="<section class=\"radio-chk\">";
		foreach ($class_array as $class_index => $class_data) {
			$chkStatus = "";
			if($class==$class_data) {
				$chkStatus = "checked";
			}
			$msg .= <<<EOT
				<input type=radio name=class id="$class_index" value="$class_data" $chkStatus><label class="main-font-family class-btn button button-rounded button-primary button-large" for="$class_index">$class_data</label>
EOT;
		}
		$msg .= "</section>";
		return $msg;
	}

	function ShowEditMbookIncomeClass($class) {
		$class_array =
		 array(	"allowance"=>"津貼",
				"salary"=>"薪金",
				"pocketmoney"=>"零用錢",
				"bonus"=>"紅利",
				"other"=>"其他" );
		$msg="<section class=\"radio-chk\">";
		foreach ($class_array as $class_index => $class_data) {
			$chkStatus = "";
			if($class==$class_data) {
				$chkStatus = "checked";
			}
			$msg .= <<<EOT
				<input type=radio name=class id="$class_index" value="$class_data" $chkStatus><label class="main-font-family class-btn button button-rounded button-primary button-large" for="$class_index">$class_data</label>
EOT;
		}
		$msg .= "</section>";
		return $msg;
	}

	function ShowEditMbookBehavior($behavior) {
		$behavior_array = array("income"=>" ","expend"=>" ");
		$behavior_disabled = array("income"=>" ","expend"=>" ");
		
		if($behavior=="收入") {
			$behavior_array['income'] = "checked";
			$behavior_disabled['expend'] = "disabled";
		} else if($behavior=="支出") {
			$behavior_array['expend'] = "checked";
			$behavior_disabled['income'] = "disabled";
		}

		$msg = <<<EOT
			<section class="moneyclass-radio-chk">
				<input type="radio" name="behavior" id="income" value="收入" $behavior_array[income] $behavior_disabled[income]>
				<label class="main-font-family moneyclass-btn button button-rounded button-primary button-large" for="income">收入</label>

				<input type="radio" name="behavior" id="expend" value="支出" $behavior_array[expend] $behavior_disabled[expend]>
				<label class="main-font-family moneyclass-btn button button-rounded button-primary button-large" for="expend">支出</label>
			</section>
EOT;
		return $msg;
	}

	function ShowEditMbookAssets($assets) {
		$assets_array = array("cash"=>" ","bank"=>" ");
		if($assets=="現金") {
			$assets_array['cash'] = "checked";
		} else if($assets=="帳戶") {
			$assets_array['bank'] = "checked";
		}

		$msg = <<<EOT
		<section class="radio-chk">
			<input type="radio" name="assets" id="cash" value="現金" $assets_array[cash]><label class="main-font-family assets-btn button button-rounded button-primary button-large" for="cash">現金</label>
			 <input type="radio" name="assets" id="bank" value="帳戶" $assets_array[bank]><label class="main-font-family assets-btn button button-rounded button-primary button-large" for="bank">帳戶</label>
		</section>
EOT;
		return $msg;
	}

	function ShowEditMbookSpendDate($date) {
		$msg = <<<EOT
			<input style="height: 40px; font-size: 20px;" type="date" name="spenddate" value="$date" >
EOT;
		return $msg;
	}

	function ShowEditMbookDes($des) {
		$desBody = "";
		if($des!="無") {
			$desBody = "value=\"$des\"";
		}
		$msg = <<<EOT
			<input type="text" class="main-font-family accounting-input-textbox" style="width: 100%;" name="des" placeholder="更詳細的內容描述" $desBody>
EOT;
		return $msg;
	}

	function ShowEditMbookMoney($money) {
		$msg = <<<EOT
			<input type="number" class="main-font-family accounting-input-textbox" style="width: 25%; ime-mode: disabled;" name="money" placeholder="新台幣" value="$money">
EOT;
		return $msg;
	}

?>