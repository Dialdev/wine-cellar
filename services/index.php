<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Услуги оказываемые интернет-магазином WineCellar.");
$APPLICATION->SetTitle("Услуги");?>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"services",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BG_POSITION" => "center",
		"BLOCK_BLOG_NAME" => "Статьи",
		"BLOCK_BRANDS_NAME" => "Бренды",
		"BLOCK_LANDINGS_NAME" => "Коллекции",
		"BLOCK_NEWS_NAME" => "Новости",
		"BLOCK_PARTNERS_NAME" => "Партнеры",
		"BLOCK_PROJECTS_NAME" => "Проекты",
		"BLOCK_REVIEWS_NAME" => "Отзывы",
		"BLOCK_SERVICES_NAME" => "Услуги",
		"BLOCK_STAFF_NAME" => "Сотрудники",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_VACANCY_NAME" => "Вакансии",
		"BLOG_TITLE" => "Комментарии",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "100000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMMENTS_COUNT" => "5",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,form_order,desc,char,gallery,docs,services,news,vacancy,blog,reviews,goods,projects,partners,staff,brands,landings,comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FB_USE" => "N",
		"DETAIL_FIELD_CODE" => array("PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE",""),
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array("LINK_BRANDS","LINK_VACANCY","FORM_QUESTION","FORM_ORDER","LINK_LANDINGS","LINK_NEWS","LINK_REVIEWS","LINK_PARTNERS","LINK_PROJECTS","LINK_GOODS","LINK_STAFF","LINK_BLOG","LINK_TIZERS","LINK_SERVICES","PROP_3","PROP_1","PROP_2","DOCUMENTS","PHOTOS","LINK_SALE","SIDE_IMAGE",""),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_VK_USE" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"FILE_404" => "",
		"FILTER_FIELD_CODE" => array("",""),
		"FILTER_NAME" => "arRegionLink",
		"FILTER_PROPERTY_CODE" => array("",""),
		"FORM_ID_ORDER_SERVISE" => "",
		"GALLERY_TYPE" => "small",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_SECTION_NAME" => "Y",
		"IBLOCK_ID" => "59",
		"IBLOCK_LINK_BLOG_ID" => "54",
		"IBLOCK_LINK_BRANDS_ID" => "67",
		"IBLOCK_LINK_LANDINGS_ID" => "",
		"IBLOCK_LINK_NEWS_ID" => "57",
		"IBLOCK_LINK_PARTNERS_ID" => "",
		"IBLOCK_LINK_PROJECTS_ID" => "52",
		"IBLOCK_LINK_REVIEWS_ID" => "56",
		"IBLOCK_LINK_SERVICES_ID" => "59",
		"IBLOCK_LINK_STAFF_ID" => "53",
		"IBLOCK_LINK_TIZERS_ID" => "47",
		"IBLOCK_LINK_VACANCY_ID" => "39",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IMAGE_CATALOG_POSITION" => "left",
		"IMAGE_POSITION" => "left",
		"IMAGE_WIDE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LANDING_IBLOCK_ID" => "158",
		"LANDING_SECTION_COUNT" => "10",
		"LANDING_TITLE" => "Популярные категории",
		"LINE_ELEMENT_COUNT" => "2",
		"LINE_ELEMENT_COUNT_LIST" => "3",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
		"LIST_PROPERTY_CODE" => array("PRICE_OLD","PRICE","PROP_1","PROP_2",""),
		"LIST_VIEW" => "slider",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_REVIEW_TRUNCATE_LEN" => "255",
		"PREVIEW_TRUNCATE_LEN" => "0",
		"PRICE_CODE" => array(0=>"BASE",),
		"SECTIONS_TYPE_VIEW" => "sections_1",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SECTION_TYPE_VIEW" => "section_1",
		"SEF_FOLDER" => "/services/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("detail"=>"#ELEMENT_CODE#/","news"=>"","section"=>""),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHARE_HANDLERS" => array("vk","twitter","mailru","delicious","lj","facebook"),
		"SHARE_HIDE" => "N",
		"SHARE_SHORTEN_URL_KEY" => "",
		"SHARE_SHORTEN_URL_LOGIN" => "",
		"SHARE_TEMPLATE" => "",
		"SHOW_404" => "Y",
		"SHOW_ASK_BLOCK" => "N",
		"SHOW_BORDER_ELEMENT" => "Y",
		"SHOW_CHILD_SECTIONS" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"SHOW_FILTER_DATE" => "Y",
		"SHOW_MAX_ELEMENT" => "N",
		"SHOW_SECTION_DESCRIPTION" => "Y",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SIDE_LEFT_BLOCK" => "RIGHT",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"SIZE_IN_ROW" => "4",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STAFF_TYPE_DETAIL" => "list",
		"STORES" => array(0=>"",1=>"",),
		"STRICT_SECTION_CHECK" => "N",
		"S_ASK_QUESTION" => "",
		"S_ORDER_SERVICE" => "",
		"S_ORDER_SERVISE" => "",
		"TITLE_SHOW_FON" => "Y",
		"TIZERS_IBLOCK_ID" => "47",
		"TYPE_IMG" => "lg",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"T_DOCS" => "",
		"T_GALLERY" => "",
		"T_GOODS" => "Товары",
		"T_MAX_LINK" => "",
		"T_PREV_LINK" => "",
		"T_PROJECTS" => "",
		"T_REVIEWS" => "",
		"T_SERVICES" => "Услуги",
		"T_STAFF" => "Получите консультацию специалиста",
		"T_VIDEO" => "",
		"USE_BG_IMAGE_ALTERNATE" => "Y",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "Y",
		"VIEW_TYPE" => "row_block",
		"VIEW_TYPE_SECTION" => "row_block"
	)
);?><br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>