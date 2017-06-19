<?php 

	$errormsg = "";

	function EditMbookErrorMsg($msg) {
		global $errormsg;
		$errormsg = $msg;
		return editmbook();
	}

	function editmbook() {
		global $errormsg;
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$loginuser = $_SESSION['loginuser'];

			include_once "DoGetUserIdMbookAction.php";
			$MbookData = DoGetUserIdMbookAction($loginuser,$id);

			include_once "ShowEditMbookItemStatus.php";

			$StatusBehavior = ShowEditMbookBehavior($MbookData['behavior']);
			$tmp = $MbookData['year']."-".str_pad($MbookData['month'],2,'0',STR_PAD_LEFT)."-".str_pad($MbookData['day'],2,'0',STR_PAD_LEFT);
			$date = new DateTime($tmp);
			$StatusSpendDate = ShowEditMbookSpendDate($tmp);
			$StatusAssets = ShowEditMbookAssets($MbookData['assets']);
			if($MbookData['behavior']=="收入") {
				$StatusClass = ShowEditMbookIncomeClass($MbookData['class']);
			} else if($MbookData['behavior']=="支出"){
				$StatusClass = ShowEditMbookExpendClass($MbookData['class']);
			}
			$StatusDes = ShowEditMbookDes($MbookData['des']);
			$StatusMoney = ShowEditMbookMoney($MbookData['money']);


			$content = <<<EOT
				<div class="accounting" >
				<form action="index.php?action=DoEditMbookAction&id=$id" method="POST">
					<input type="hidden" name="id" value="$id">
					<table class="main-font-family accounting-table">
						<tr> 
							<td>行為</td>
							<td>
								$StatusBehavior
							</td>
						</tr>
						<tr> 
							<td>日期</td>
							<td>
								$StatusSpendDate
							</td>
						</tr>
						<tr> 
							<td>資產</td>
							<td>
								$StatusAssets
							</td>
						</tr>
						<tr> 
							<td>類型</td>
							<td>
								$StatusClass
							</td>
						</tr>
						<tr> 
							<td>描述</td>
							<td>
								$StatusDes
							</td>
						</tr>
						<tr> 
							<td>現金</td>
							<td>
								$StatusMoney
							</td>
						</tr>
				</table>
				<div class="errormsg main-font-family">$errormsg</div>
				<input type="submit" value="儲存" class="main-font-family accounting-add-btn button button-block button-rounded button-primary button-large">
				</form>
				
			</div>
EOT;

			
		}
		return $content;
	}



?>