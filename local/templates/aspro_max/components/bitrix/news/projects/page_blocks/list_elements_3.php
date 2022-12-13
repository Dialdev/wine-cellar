<?$APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "front_news", 
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
	"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
        "AJAX_MODE" => $arParams["AJAX_MODE"],
        "AJAX_OPTION_JUMP" => $arParams["AJAX_OPTION_JUMP"],
        "AJAX_OPTION_STYLE" => $arParams["AJAX_OPTION_STYLE"],
        "AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
        "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
        "IMG_POSITION" => "right",
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "AJAX_OPTION_ADDITIONAL" => "",
        "COMPONENT_TEMPLATE" => "front_news",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
        "TITLE_BLOCK" => "",
        "TITLE_BLOCK_ALL" => "",
        "ALL_URL" => "", 
        "SIZE_IN_ROW" => $bIsHideLeftBlock ? '4' : '3', //$arParams["SIZE_IN_ROW"],
        "TYPE_IMG" => $arParams["TYPE_IMG"],
        "SHOW_SECTION_NAME" => "Y",
        "BORDERED" => $arParams["SHOW_BORDER_ELEMENT"],
        "FON_BLOCK_2_COLS" => "Y",
        "BG_POSITION" => $arParams["BG_POSITION"],
        "INCLUDE_FILE" => "",
        "SHOW_SUBSCRIBE" => "N",
        "TITLE_SHOW_FON" => $arParams["TITLE_SHOW_FON"],
        "TITLE_SUBSCRIBE" => "",
        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
        "SHOW_404" => $arParams["SHOW_404"],
        "IS_AJAX" => CMax::checkAjaxRequest(),
        "MESSAGE_404" => "",
	"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
	"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
	"USE_BG_IMAGE_ALTERNATE" => 'Y',//$arParams["USE_BG_IMAGE_ALTERNATE"],
	"ALL_BLOCK_BG" => 'Y',//$arParams["ALL_BLOCK_BG"],
	"TALL_BG_BLOCKS" => 'Y',
	"USE_SECTIONS_TABS" => (isset($arParams["TYPE_HEAD_BLOCK"]) && ($arParams["TYPE_HEAD_BLOCK"]=='sections_mix'||$arParams["TYPE_HEAD_BLOCK"]=='sections_links'))? 'Y' : 'N',
	"USE_DATE_MIX_TABS" => (isset($arParams["TYPE_HEAD_BLOCK"]) && $arParams["TYPE_HEAD_BLOCK"]=='years_mix')? 'Y' : 'N',
	
    ),
    $component
);?>