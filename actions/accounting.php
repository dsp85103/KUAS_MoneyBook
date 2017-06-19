<?php
	
	$errormsg = "";
	$accounting_table_data = array(
				"income"=>"",
				"expend"=>"",
				"assets"=>"請先選擇行為",
				"class"=>"請先選擇行為"
			);

	function AccountingErrorMsg($behavior,$msg) {
		global $errormsg;
		$errormsg = $msg;
		return accounting_table($behavior);
	}

	function accounting_table($behavior) {
		global $accounting_table_data;
		
		
		if($behavior=="income") {

			$accounting_table_data['income'] = "checked";
			$accounting_table_data['expend'] = "";
			include_once "ShowIncomeClassContent.php";
			$accounting_table_data['class'] = ShowIncomeClassContent();
			include_once "ShowAssetsContent.php";
			$accounting_table_data['assets'] = ShowAssetsContent();

		} else if($behavior=="expend") {

			$accounting_table_data['expend'] = "checked";
			$accounting_table_data['income'] = "";
			include_once "ShowExpendClassContent.php";
			$accounting_table_data['class'] = ShowExpendClassContent();
			include_once "ShowAssetsContent.php";
			$accounting_table_data['assets'] = ShowAssetsContent();

		} else {
			$accounting_table_data = array(
				"income"=>"",
				"expend"=>"",
				"assets"=>"請先選擇行為",
				"class"=>"請先選擇行為"
			);
		}

		return accounting();
	}
	
	function accounting() {

		global $accounting_table_data,$errormsg;
		include_once "DoCheckSessionAuth.php";
		$msg = DoCheckSessionAuth();


		if($msg) {

			$todaydate = date('Y-m-d');
			$content = <<<EOT
				<div class="accounting" >
				<form action="index.php?action=DoAccountingAction" method="POST">
					<table class="main-font-family accounting-table">
						<tr> 
							<td>行為</td>
							<td>
								<section class="moneyclass-radio-chk">
									<input type="radio" name="behavior" id="income" value="收入" onclick="location.href='index.php?action=accounting_income'" $accounting_table_data[income] >
									<label class="main-font-family moneyclass-btn button button-rounded button-primary button-large" for="income">收入</label>

									<input type="radio" name="behavior" id="expend" value="支出" onclick="location.href='index.php?action=accounting_expend'" $accounting_table_data[expend] >
									<label class="main-font-family moneyclass-btn button button-rounded button-primary button-large" for="expend">支出</label>
								</section>
							</td>
						</tr>
						<tr> 
							<td>日期</td><td><input style="height: 40px; font-size: 20px;" type="date" name="spenddate" value="$todaydate"></td>
						</tr>
						<tr> 
							<td>資產</td>
							<td>
								<section class="radio-chk">
									$accounting_table_data[assets]
								</section>
							</td>
						</tr>
						<tr> 
							<td>類型</td>
							<td>
								<section class="radio-chk">
									$accounting_table_data[class]
								</section>
							</td>
						</tr>
						<tr> 
							<td>描述</td>
							<td>
								<input type="text" class="main-font-family accounting-input-textbox" style="width: 100%;" name="des" placeholder="更詳細的內容描述">
							</td>
						</tr>
						<tr> 
							<td>現金</td>
							<td>
								<input type="number" class="main-font-family accounting-input-textbox" style="width: 25%; ime-mode: disabled;" name="money" placeholder="新台幣">
							</td>
						</tr>
				</table>
				<div class="errormsg main-font-family">$errormsg</div>
				<input type="submit" value="新增" class="main-font-family accounting-add-btn button button-block button-rounded button-primary button-large">
				</form>
				
			</div>
EOT;
		} else {
			header("Location: index.php?action=homepage");
			exit;
		}
		return $content;
	}

?>