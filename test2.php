<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
Bitrix\Main\Loader::includeModule('sale');

echo"<pre>";
var_dump(CSaleOrderPropsValue::GetOrderProps(1807));
echo"</pre>";
