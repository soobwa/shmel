<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([_\\-a-z0-9]+)/([0-9]+)(/)*(index\\.php)*(\\?.*)*\$#",
		"RULE" => "SECTION_CODE=\$1&ELEMENT_ID=\$2",
		"ID" => "",
		"PATH" => "/catalog/detail.php",
	),
	array(
		"CONDITION" => "#^/catalog/([_\\-a-z0-9]+)(/)*(index\\.php)*(\\?.*)*\$#",
		"RULE" => "SECTION_CODE=\$1",
		"ID" => "",
		"PATH" => "/catalog/section.php",
	),
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
);

?>