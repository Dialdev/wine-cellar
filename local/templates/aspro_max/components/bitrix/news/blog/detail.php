<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<? $this->setFrameMode(true); ?>

<? global $arTheme, $isHideLeftBlock, $isWidePage; ?>
<?
if (isset($arParams["TYPE_LEFT_BLOCK_DETAIL"]) && $arParams["TYPE_LEFT_BLOCK_DETAIL"] != 'FROM_MODULE') {
	$arTheme['LEFT_BLOCK']['VALUE'] = $arParams["TYPE_LEFT_BLOCK_DETAIL"];
}

if (isset($arParams["SIDE_LEFT_BLOCK_DETAIL"]) && $arParams["SIDE_LEFT_BLOCK_DETAIL"] != 'FROM_MODULE') {
	$arTheme['SIDE_MENU']['VALUE'] = $arParams["SIDE_LEFT_BLOCK_DETAIL"];
}
?>

<?
if (!$isHideLeftBlock && $APPLICATION->GetProperty("HIDE_LEFT_BLOCK_DETAIL") == "Y") {
	$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", "Y");
	$APPLICATION->AddViewContent('container_inner_class', ' contents_page ');
	$APPLICATION->AddViewContent('wrapper_inner_class', ' wide_page ');
	if (!$isWidePage) {
		$APPLICATION->AddViewContent('right_block_class', ' maxwidth-theme ');
	}
}
?>

<?
// get element
$arItemFilter = CMax::GetCurrentElementFilter($arResult['VARIABLES'], $arParams);

global $APPLICATION, $arRegion;
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/animation/animate.min.css');

if ($arParams['CACHE_GROUPS'] == 'Y') {
	$arItemFilter['CHECK_PERMISSIONS'] = 'Y';
	$arItemFilter['GROUPS'] = $GLOBALS["USER"]->GetGroups();
}

/*$arElement = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'MULTI' => 'N')), $arItemFilter, false, false, array('ID', 'PREVIEW_TEXT', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PROPERTY_LINK_GOODS', 'PROPERTY_LINK_REGION','ACTIVE_FROM', 'PROPERTY_LINK_GOODS_FILTER'));*/
$arElement = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'MULTI' => 'N')), $arItemFilter, false, false, array('ID', 'PREVIEW_TEXT', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'ACTIVE_FROM', 'ACTIVE_TO', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL', 'LIST_PAGE_URL', 'PROPERTY_LINK_GOODS', 'PROPERTY_LINK_REGION', 'PROPERTY_LINK_GOODS_FILTER', 'PERIOD'));



if ($arParams["SHOW_MAX_ELEMENT"] == "Y") {
	$arSort = array($arParams["SORT_BY1"] => $arParams["SORT_ORDER1"], $arParams["SORT_BY2"] => $arParams["SORT_ORDER2"]);
	$arElementNext = array();

	$arAllElements = CMaxCache::CIblockElement_GetList(array($arParams["SORT_BY1"] => $arParams["SORT_ORDER1"], $arParams["SORT_BY2"] => $arParams["SORT_ORDER2"], 'CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'MULTI' => 'Y')), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "SECTION_ID" => $arElement["IBLOCK_SECTION_ID"]/*, ">ID" => $arElement["ID"]*/), false, false, array('ID', 'DETAIL_PAGE_URL', 'IBLOCK_ID', 'SORT'));
	if ($arAllElements) {
		$url_page = $APPLICATION->GetCurPage();
		$key_item = 0;
		foreach ($arAllElements as $key => $arItemElement) {
			if ($arItemElement["DETAIL_PAGE_URL"] == $url_page) {
				$key_item = $key;
				break;
			}
		}
		if (strlen($key_item)) {
			$arElementNext = $arAllElements[$key_item + 1];
		}
		if ($arElementNext) {
			if ($arElementNext["DETAIL_PAGE_URL"] && is_array($arElementNext["DETAIL_PAGE_URL"])) {
				$arElementNext["DETAIL_PAGE_URL"] = current($arElementNext["DETAIL_PAGE_URL"]);
			}
		}
	}
}
?>
<? if (!$arElement && $arParams['SET_STATUS_404'] !== 'Y') : ?>
	<div class="alert alert-warning"><?= GetMessage("ELEMENT_NOTFOUND") ?></div>
<? elseif (!$arElement && $arParams['SET_STATUS_404'] === 'Y') : ?>
	<? CMax::goto404Page(); ?>
<? else : ?>

	<? CMax::AddMeta(
		array(
			'og:description' => $arElement['PREVIEW_TEXT'],
			'og:image' => (($arElement['PREVIEW_PICTURE'] || $arElement['DETAIL_PICTURE']) ? CFile::GetPath(($arElement['PREVIEW_PICTURE'] ? $arElement['PREVIEW_PICTURE'] : $arElement['DETAIL_PICTURE'])) : false),
		)
	); ?>


	<?
	/* hide compare link from module options */
	if (CMax::GetFrontParametrValue('CATALOG_COMPARE') == 'N')
		$arParams["DISPLAY_COMPARE"] = 'N';
	/**/
	?>

	<?
	$bActiveDate = (strlen($arElement['PERIOD']['VALUE']) && in_array('PERIOD', $arParams['DETAIL_PROPERTY_CODE'])) || ($arElement['ACTIVE_FROM'] && in_array('DATE_ACTIVE_FROM', $arParams['DETAIL_FIELD_CODE']));
	$bDiscountCounter = ($arElement['ACTIVE_TO'] && in_array('ACTIVE_TO', $arParams['DETAIL_FIELD_CODE']));
	$bShowDopBlock = (($arElement['SALE_NUMBER']['VALUE'] && in_array('SALE_NUMBER', $arParams['DETAIL_PROPERTY_CODE'])) || $bDiscountCounter);
	$bShowPeriodLine = $bActiveDate || $bShowDopBlock;
	//var_dump($arElement['ACTIVE_FROM']);
	?>

	<div class="detail <?= ($templateName = $component->{'__template'}->{'__name'}) ?> fixed_wrapper">
		<? if ($arElement) : ?>

			<? if (!$bShowPeriodLine) : ?>
				<? $this->SetViewTarget('product_share'); ?>
				<? if ($arParams["USE_SHARE"] == "Y") : ?>
					<? \Aspro\Functions\CAsproMax::showShareBlock('top') ?>
				<? endif; ?>
				<? if ($arParams['USE_RSS'] !== 'N') : ?>
					<div class="colored_theme_hover_bg-block">
						<?= CMax::ShowRSSIcon($arResult['FOLDER'] . $arResult['URL_TEMPLATES']['rss']); ?>
					</div>
				<? endif; ?>

				<? if ($arParams["USE_SUBSCRIBE_IN_TOP"] == "Y") : ?>
					<div>
						<div class="colored_theme_hover_bg-block dark_link animate-load" data-event="jqm" data-param-type="subscribe" data-name="subscribe" title="<?= GetMessage('SUBSCRIBE_TEXT') ?>">
							<?= CMax::showIconSvg("subscribe", SITE_TEMPLATE_PATH . "/images/svg/subscribe_insidepages.svg", "", "colored_theme_hover_bg-el-svg", true, false); ?>
						</div>
					</div>
				<? endif; ?>
				<? $this->EndViewTarget(); ?>
			<? else : ?>
				<? $this->SetViewTarget('share_in_contents'); ?>

				<? if ($arParams["USE_SHARE"] == "Y") : ?>
					<? \Aspro\Functions\CAsproMax::showShareBlock('top') ?>
				<? endif; ?>
				<? if ($arParams['USE_RSS'] !== 'N') : ?>
					<div class="colored_theme_hover_bg-block">
						<?= CMax::ShowRSSIcon($arResult['FOLDER'] . $arResult['URL_TEMPLATES']['rss']); ?>
					</div>
				<? endif; ?>

				<? if ($arParams["USE_SUBSCRIBE_IN_TOP"] == "Y") : ?>
					<div>
						<div class="colored_theme_hover_bg-block dark_link animate-load" data-event="jqm" data-param-type="subscribe" data-name="subscribe" title="<?= GetMessage('SUBSCRIBE_TEXT') ?>">
							<?= CMax::showIconSvg("subscribe", SITE_TEMPLATE_PATH . "/images/svg/subscribe_insidepages.svg", "", "colored_theme_hover_bg-el-svg", true, false); ?>
						</div>
					</div>
				<? endif; ?>
				<? $this->EndViewTarget(); ?>
			<? endif; ?>

		<? endif; ?>
		<?
		if (isset($arItemFilter['CODE'])) {
			unset($arItemFilter['CODE']);
			unset($arItemFilter['SECTION_CODE']);
		}
		if (isset($arItemFilter['ID'])) {
			unset($arItemFilter['ID']);
			unset($arItemFilter['SECTION_ID']);
		}
		?>
		<? $arSections = CMaxCache::CIBLockSection_GetList(array('SORT' => 'ASC', 'NAME' => 'ASC', 'CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'GROUP' => array('ID'), 'MULTI' => 'N', 'URL_TEMPLATE' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['section'])), array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'DEPTH_LEVEL' => 1, 'ACTIVE' => 'Y'), false, array('ID', 'SECTION_PAGE_URL'));
		$arTags = array();
		if ($arSections) {
			foreach ($arSections as $key => $arSection) {
				$arElements = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'MULTI' => 'Y')), array_merge($arItemFilter, array("SECTION_ID" => $arSection["ID"])), false, false, array('ID', 'TAGS'));
				if (!$arElements)
					unset($arSections[$key]);
				else {
					foreach ($arElements as $arTmp) {
						if ($arTmp['TAGS']) {
							$arTags[] = explode(',', $arTmp['TAGS']);
						}
					}
					$arSections[$key]['ELEMENT_COUNT'] = count($arElements);
				}
			}
		} else {
			$arElements = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($arParams['IBLOCK_ID']), 'MULTI' => 'Y')), $arItemFilter, false, false, array('ID', 'TAGS'));

			foreach ($arElements as $arTmp) {
				if ($arTmp['TAGS']) {
					$arTags[] = explode(',', $arTmp['TAGS']);
				}
			}
		}
		?>

		<? $this->__component->__template->SetViewTarget('under_sidebar_content'); ?>
		<? if ($arSections) : ?>

			<div class="categories_block menu_top_block">
				<?/*<div class="categories_title darken font_md"><?=GetMessage('CATEGORY');?></div>*/ ?>
				<?
				$cur_page = $GLOBALS['APPLICATION']->GetCurPage(true);
				$cur_page_no_index = $GLOBALS['APPLICATION']->GetCurPage(false);
				?>
				<ul class="categories left_menu dropdown">
					<? foreach ($arSections as $arSection) :
						if (isset($arSection['NAME']) && $arSection['NAME']) : ?>
							<li class="categories_item  v_bottom <?= (CMenu::IsItemSelected($arSection['SECTION_PAGE_URL'], $cur_page, $cur_page_no_index) ? 'current' : ''); ?>"><a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="categories_link bordered rounded2"><span class="categories_name darken"><?= $arSection['NAME']; ?></span><span class="categories_count muted"><?= $arSection['ELEMENT_COUNT']; ?></span></a></li>
						<? endif; ?>
					<? endforeach; ?>
				</ul>
			</div>

		<? endif; ?>
		<? $APPLICATION->IncludeComponent(
			"bitrix:search.tags.cloud",
			"main",
			array(
				"CACHE_TIME" => "86400",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"COLOR_NEW" => "3E74E6",
				"COLOR_OLD" => "C0C0C0",
				"COLOR_TYPE" => "N",
				"TAGS_ELEMENT" => $arTags,
				"FILTER_NAME" => "",
				"FONT_MAX" => "50",
				"FONT_MIN" => "10",
				"PAGE_ELEMENTS" => "150",
				"PERIOD" => "",
				"PERIOD_NEW_TAGS" => "",
				"SHOW_CHAIN" => "N",
				"SORT" => "NAME",
				"TAGS_INHERIT" => "Y",
				"URL_SEARCH" => SITE_DIR . "search/index.php",
				"WIDTH" => "100%",
				"arrFILTER" => array("iblock_aspro_max_content"),
				"arrFILTER_iblock_aspro_max_content" => array($arParams["IBLOCK_ID"])
			),
			$component
		); ?>
		<? $this->__component->__template->EndViewTarget(); ?>

		<?/*goods block filter*/ ?>
		<? //$list_view = ($arParams['LIST_VIEW'] ? $arParams['LIST_VIEW'] : 'slider');
		?>
		<? // goods links
		?>
		<? if (in_array('LINK_GOODS', $arParams['DETAIL_PROPERTY_CODE'])) : ?>
			<?
			$catalogID = \Bitrix\Main\Config\Option::get('aspro.max', 'CATALOG_IBLOCK_ID', CMaxCache::$arIBlocks[SITE_ID]["aspro_max_catalog"]["aspro_max_catalog"][0]);
			$dbProperty = CIBlockProperty::GetList(array(), array("IBLOCK_ID" => $catalogID, "CODE" => "LINK_BLOG"));
			if ($dbProperty->SelectedRowsCount() && $arElement['ID']) {
				$arTmpElement = CMaxCache::CIblockElement_GetList(array('CACHE' => array('TAG' => CMaxCache::GetIBlockCacheTag($catalogID), 'MULTI' => 'Y')), array('IBLOCK_ID' => $catalogID, 'PROPERTY_LINK_BLOG' => $arElement['ID']), false, false, array('ID'));
				if ($arTmpElement) {
					foreach ($arTmpElement as $key => $arItem)
						$arFilterElements[] = $arItem['ID'];

					if ($arElement['PROPERTY_LINK_GOODS_VALUE'])
						$arElement['PROPERTY_LINK_GOODS_VALUE'] = array_merge((array)$arElement['PROPERTY_LINK_GOODS_VALUE'], $arFilterElements);
					else
						$arElement['PROPERTY_LINK_GOODS_VALUE'] = $arFilterElements;
				}
			}
			$arTmpGoods = json_decode($arElement["~PROPERTY_LINK_GOODS_FILTER_VALUE"], true);
			?>
			<? if ($arElement['PROPERTY_LINK_GOODS_VALUE'] || ($arElement['PROPERTY_LINK_GOODS_FILTER_VALUE'] && $arTmpGoods['CHILDREN'])) : ?>
				<?
				if (!isset($arParams["PRICE_CODE"]))
					$arParams["PRICE_CODE"] = array(0 => "BASE", 1 => "OPT");
				if (!isset($arParams["STORES"]))
					$arParams["STORES"] = array(0 => "1", 1 => "2");

				if (!($arElement['PROPERTY_LINK_GOODS_FILTER_VALUE'] && $arTmpGoods['CHILDREN']))
					$GLOBALS['arrProductsFilter'] = array('ID' => $arElement['PROPERTY_LINK_GOODS_VALUE']);
				// var_dump($arElement);
				global $arRegion;
				if ($arRegion) {
					if ($arRegion['LIST_PRICES']) {
						if (reset($arRegion['LIST_PRICES']) != 'component')
							$arParams['PRICE_CODE'] = array_keys($arRegion['LIST_PRICES']);
					}
					if ($arRegion['LIST_STORES']) {
						if (reset($arRegion['LIST_STORES']) != 'component')
							$arParams['STORES'] = $arRegion['LIST_STORES'];
					}
				}

				if ($arParams['LIST_PRICES']) {
					foreach ($arParams['LIST_PRICES'] as $key => $price) {
						if (!$price)
							unset($arParams['LIST_PRICES'][$key]);
					}
				}

				if ($arParams['STORES']) {
					foreach ($arParams['STORES'] as $key => $store) {
						if (!$store)
							unset($arParams['STORES'][$key]);
					}
				}

				if ($arRegion) {
					if ($arRegion["LIST_STORES"] && $arParams["HIDE_NOT_AVAILABLE"] == "Y") {
						if ($arParams['STORES']) {
							if (count($arParams['STORES']) > 1) {
								$arStoresFilter = array('LOGIC' => 'OR');
								foreach ($arParams['STORES'] as $storeID) {
									$arStoresFilter[] = array(">CATALOG_STORE_AMOUNT_" . $storeID => 0);
								}
							} else {
								foreach ($arParams['STORES'] as $storeID) {
									$arStoresFilter = array(">CATALOG_STORE_AMOUNT_" . $storeID => 0);
								}
							}

							$arTmpFilter = array('!TYPE' => '2');
							if ($arStoresFilter) {
								if (count($arStoresFilter) > 1) {
									$arTmpFilter[] = $arStoresFilter;
								} else {
									$arTmpFilter = array_merge($arTmpFilter, $arStoresFilter);
								}

								$GLOBALS['arrProductsFilter'][] = array(
									'LOGIC' => 'OR',
									array('TYPE' => '2'),
									$arTmpFilter,
								);
							}
						}
					}
				}
				?>
			<? endif; ?>
			<? endif; ?><? //var_dump($arTmpGoods);
						?>
			<?/*end goods filter*/ ?>

			<? //element
			?>
			<? $sViewElementTemplate = ($arParams["ELEMENT_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["BLOG_PAGE_DETAIL"]["VALUE"] : $arParams["ELEMENT_TYPE_VIEW"]); ?>
			<? @include_once('page_blocks/' . $sViewElementTemplate . '.php'); ?>

	</div>
	<?/*
	if(is_array($arElement['IBLOCK_SECTION_ID']) && count($arElement['IBLOCK_SECTION_ID']) > 1){
		CMax::CheckAdditionalChainInMultiLevel($arResult, $arParams, $arElement);
	}*/
	?>
	<? global $isHideLeftBlock; ?>

	<? $APPLICATION->ShowViewContent('tags_content'); ?>
	<div class="catalog-slider-block">
		<?
		$arSelect = Array('PROPERTY_LINK_SECTION');
		$arFilter = Array("IBLOCK_ID"=>1, "CODE" => $arResult['VARIABLES']['ELEMENT_CODE'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect)->GetNextElement()->GetFields();
		
		if (!empty($res['PROPERTY_LINK_SECTION_VALUE'])) {
			
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"catalog_slider",
				array(
					"COMPONENT_TEMPLATE" => ".default",
					"IBLOCK_TYPE" => "aspro_corporation_catalog",	// Тип инфоблока
					"IBLOCK_ID" => "11",	// Инфоблок
					"SECTION_ID" => $res['PROPERTY_LINK_SECTION_VALUE'],	// ID раздела
					"SECTION_CODE" => "",	// Код раздела
					"SECTION_USER_FIELDS" => array(	// Свойства раздела
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
					"HIDE_NOT_AVAILABLE" => "Y",	// Недоступные товары
					"HIDE_NOT_AVAILABLE_OFFERS" => "Y",	// Недоступные торговые предложения
					"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
					"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
					"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
					"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
					"PAGE_ELEMENT_COUNT" => "16",	// Количество элементов на странице
					"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
					"PROPERTY_CODE" => array(	// Свойства
						0 => "LINK_SECTION",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => "",	// Свойства товаров, отображаемые на мобильных устройствах
					"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
					"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
					"TEMPLATE_THEME" => "blue",	// Цветовая тема
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Вариант отображения товаров
					"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
					"SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
					"SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
					"SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
					"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
					"LABEL_PROP" => "",	// Свойства меток товара
					"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
					"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
					"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
					"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
					"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
					"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
					"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
					"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
					"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
					"RCM_TYPE" => "personal",	// Тип рекомендации
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],	// Параметр ID продукта (для товарных рекомендаций)
					"SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
					"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
					"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
					"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"CACHE_TYPE" => "N",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_GROUPS" => "N",	// Учитывать права доступа
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
					"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
					"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
					"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
					"PRICE_CODE" => array(	// Тип цены
						0 => "Я.WC Наличие",
					),
					"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
					"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
					"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
					"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
					"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
					"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
					"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
					"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
					"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
					"PRODUCT_PROPERTIES" => "",	// Характеристики товара
					"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
					"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
					"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
					"PAGER_TITLE" => "Товары",	// Название категорий
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"LAZY_LOAD" => "N",	// Показать кнопку ленивой загрузки Lazy Load
					"LOAD_ON_SCROLL" => "N",	// Подгружать товары при прокрутке до конца
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SHOW_404" => "N",	// Показ специальной страницы
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
				),
				false
			);
		}
		?>

	</div>
	<div class="bottom-links-block">
		<a class="muted back-url url-block" href="<?= $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['news'] ?>">
			<?= CMax::showIconSvg("return_to_the_list", SITE_TEMPLATE_PATH . "/images/svg/return_to_the_list.svg", ""); ?>
			<span class="font_upper back-url-text"><?= ($arParams["T_PREV_LINK"] ? $arParams["T_PREV_LINK"] : GetMessage('BACK_LINK')); ?></span></a>

		<? if ($arParams["SHOW_MAX_ELEMENT"] == "Y" && $arElementNext) : ?>
			<a class="muted next-url url-block" href="<?= $arElementNext['DETAIL_PAGE_URL'] ?>">
				<span class="font_upper next-url-text"><?= ($arParams["T_MAX_LINK"] ? $arParams["T_MAX_LINK"] : GetMessage('MAX_LINK')); ?></span>
				<?= CMax::showIconSvg("next_element", SITE_TEMPLATE_PATH . "/images/svg/return_to_the_list.svg", ""); ?>
			</a>
		<? endif; ?>

		<? if ($arParams["USE_SHARE"] == "Y" && $arElement) : ?>
			<? \Aspro\Functions\CAsproMax::showShareBlock('bottom') ?>
		<? endif; ?>
	</div>

<? endif; ?>