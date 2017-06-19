<?php
	function ShowAboutSiteMsg() {
		$content = <<<EOT
			<div class="index-aboutme main-font-family">
				<div class="index-aboutme-option-area">
					<a href="index.php?action=developer" target="_blank" class="index-aboutme-option">關於網站</a> | 
					<a href="mailto:1105137124@gm.kuas.edu.tw?Subject=KUAS_Accounting_System" target="_top" class="index-aboutme-option">聯絡我們</a> | 
					<a href="index.php?action=resource" target="_blank" class="index-aboutme-option">相關資源</a>
				</div> 
				© 2017 國立高雄應用科技大學 105級資訊管理系 期末作業
			</div>
EOT;
		return $content;
	}



?>
