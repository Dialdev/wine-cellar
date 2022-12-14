<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme, $arRegion, $bLongHeader2, $dopClass, $dopBodyClass;
$arRegions = CMaxRegionality::getRegions();
if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
$bLongHeader2 = true;
$dopClass = 'wides_menu smalls big_header sticky_menu';
$dopBodyClass = ' sticky_menu';
?>
<div class="header-wrapper fix-logo header-v28">
	<div class="logo_and_menu-row showed">
		<div class="logo-row">
			<div class="maxwidth-theme wides">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block no-area">
							<div class="subcontent">
								<div class="subtop lines-block">
									<div class="row">
										<div class="col-md-12 top-block">
											<?if($arRegions):?>
												<div class="pull-left">
													<div class="top-description no-title">
														<?\Aspro\Functions\CAsproMax::showRegionList();?>
													</div>
												</div>
											<?endif;?>
											
											<div class="pull-left menus">
												<div class="menus-inner">
													<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
														array(
															"COMPONENT_TEMPLATE" => ".default",
															"PATH" => SITE_DIR."include/menu/menu.topest2.php",
															"AREA_FILE_SHOW" => "file",
															"AREA_FILE_SUFFIX" => "",
															"AREA_FILE_RECURSIVE" => "Y",
															"EDIT_TEMPLATE" => "include_area.php"
														),
														false
													);?>
												</div>
											</div>

											<div class="right-icons pull-right wb top-block-item logo_and_menu-row showed">
												<div class="pull-right">
													<div class="wrap_icon inner-table-block1 person">
														<?=CMax::showCabinetLink(true, true, 'big');?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="subbottom">
									<div class="right-icons pull-right wb top-block-item logo_and_menu-row">
										<div class="pull-right">
											<?=CMax::ShowBasketWithCompareLink('', 'big', '', 'wrap_icon wrap_basket baskets');?>
											<?/*=CMax::ShowBasketWithCompareLink('', 'big', false, false, true);*/?>
										</div>
										
										<div class="pull-right">
											<div class="wrap_icon inner-table-block"><!-- noindex -->
												<div class="phone-block icons blocks">
													<div class="">
														<!-- <a rel="nofollow" target="_blank" href="https://wa.me/79255144599" style="padding-right:20px;"><img src="/upload/whatsapp-icon.svg" style="width: 35px;"></a> -->
														<a rel="nofollow" target="_blank" href="https://t.me/WineCellar_bot" style="padding-right:20px;"><img src="/upload/tg-64.png" alt="Telegram" style="width: 35px;"></a>
													</div>
												</div><!-- /noindex -->
											</div>
											<div class="wrap_icon inner-table-block">
												<div class="phone-block icons blocks">
													<?if($bPhone):?>
														<?CMax::ShowHeaderPhones('');?>
													<?endif?>
													<?if($arTheme['SHOW_CALLBACK']['VALUE'] == 'Y'):?>
														<div class="inline-block">
															<span class="callback-block animate-load font_upper_xs colored" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
														</div>
													<?endif;?>
												</div>
											</div>
											
										</div>
									</div>
									<div class="search_wraps">
										<div class="search-block inner-table-block">
											<?$APPLICATION->IncludeComponent(
												"bitrix:main.include",
												"",
												Array(
													"AREA_FILE_SHOW" => "file",
													"PATH" => SITE_DIR."include/top_page/search.title.catalog.php",
													"EDIT_TEMPLATE" => "include_area.php",
													'SEARCH_ICON' => 'Y',
												)
											);?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="lines-row"></div>
			</div>
		</div><?// class=logo-row?>
	</div>
</div>
<div class="sidebar_menu">
	<div class="sidebar_menu_inner">
		<div class="logo-row">
			<div class="logo-block">
				<div class="logo<?=$logoClass?>">
					<?=CMax::ShowLogo();?>
				</div>
			</div>
		</div>
		<div class="menu-wrapper">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "left_catalog", array(
				"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "3600000",
				"MENU_CACHE_USE_GROUPS" => "N",
				"CACHE_SELECTED_ITEMS" => "N",
				"MENU_CACHE_GET_VARS" => "",
				"MAX_LEVEL" => $arTheme["MAX_DEPTH_MENU"]["VALUE"],
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N" ),
				false, array( "ACTIVE_COMPONENT" => "Y" )
			);?>
		</div>
	</div>
</div>