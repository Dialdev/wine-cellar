<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<? global $arTheme, $APPLICATION, $bShowCallBackBlock, $bShowQuestionBlock, $bShowReviewBlock, $isIndex, $isShowIndexLeftBlock;?>
<div class="display-none-articles left_block sticky-sidebar<?=($isIndex ? ($isShowIndexLeftBlock ? "" : " hidden") : "");?>">
	<div class="sticky-sidebar__inner">
		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/menu.left_menu.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"HIDE_CATALOG" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>

		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/comp_subscribe.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>

		<?$APPLICATION->ShowViewContent('left_menu');?>
		<?$APPLICATION->ShowViewContent('under_sidebar_content');?>

		<?CMax::get_banners_position('SIDE', 'Y');?>

		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/comp_news_articles.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
	</div>
</div>