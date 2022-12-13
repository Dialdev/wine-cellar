<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
global $arTheme;
$bPrintButton = ($arTheme['PRINT_BUTTON']['VALUE'] == 'Y' ? true : false);
?>
<div class="footer-v1">
	<div class="footer-inner">
		<div class="footer_top">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="col-md-2 col-sm-3">
						<div class="fourth_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom2", array(
								"ROOT_MENU_TYPE" => "bottom",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600000",
								"MENU_CACHE_USE_GROUPS" => "N",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "Y"
								),
								false
							);?>
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="first_bottom_menu">
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ROOT_MENU_TYPE" => "bottom_company",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"COMPONENT_TEMPLATE" => "bottom",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="second_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
	"ROOT_MENU_TYPE" => "bottom_info",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="third_bottom_menu">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
								"ROOT_MENU_TYPE" => "bottom_help",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600000",
								"MENU_CACHE_USE_GROUPS" => "N",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "left",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "Y"
								),
								false
							);?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 contact-block">
						<div class="info">
							<div class="row">
								<?if(\Bitrix\Main\Loader::includeModule('subscribe')):?>
									<div class="col-md-12 col-sm-12">
										<div class="subscribe_button">
											<span class="btn" data-event="jqm" data-param-id="subscribe" data-param-type="subscribe" data-name="subscribe"><?=GetMessage('SUBSCRIBE_TITLE')?><?=CMax::showIconSvg('subscribe', SITE_TEMPLATE_PATH.'/images/svg/subscribe_small_footer.svg')?></span>
										</div>
									</div>
								<?endif;?>
								<div class="col-md-12 col-sm-12">
									<div class="phone blocks">
										<div class="inline-block">
											<?CMax::ShowHeaderPhones('white sm', true);?>
										</div>

										<?if($arTheme['SHOW_CALLBACK']['VALUE'] == 'Y'):?>
											<div class="inline-block callback_wrap">
												<span class="callback-block animate-load colored" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback"><?=GetMessage("CALLBACK")?></span>
											</div>
										<?endif;?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 futer_vrem_rab">

									<div style="float: left; margin-right: 1rem;">
<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 0C2.46262 0 0 2.46262 0 5.5C0 8.53738 2.46262 11 5.5 11C8.53738 11 11 8.53738 11 5.5C11 2.46262 8.53738 0 5.5 0ZM9.21211 6.27354H5.5C5.07269 6.27354 4.72656 5.92741 4.72656 5.5001V1.7876C4.97717 1.74394 5.23527 1.71885 5.5 1.71885C5.76473 1.71885 6.02283 1.74394 6.27344 1.7876V4.72656H9.21221C9.25617 4.97717 9.28126 5.23527 9.28126 5.5C9.28126 5.76473 9.25617 6.02283 9.21221 6.27344L9.21211 6.27354Z" fill="#999999"/>
</svg>
</div>
									<div style="float: left;">
										<?CMax::showContactSchedule('Режим работы', true);?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<?/*=CMax::showEmail('email blocks')*/?>
								</div>
								<div class="col-md-12 col-sm-12">
									<?=CMax::showAddress('address blocks')?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_middle">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="social-block">
							<?$APPLICATION->IncludeComponent("aspro:social.info.max", "template1", Array(
	"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600000",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bottom">
			<div class="maxwidth-theme">
				<div class="row">
					<div class="link_block col-md-6 col-sm-6 pull-right">
						<div class="pull-right">
							<div class="pays">
								<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/pay_system_icons.php", Array(), Array(
										"MODE" => "php",
										"NAME" => "onfidentiality",
										"TEMPLATE" => "include_area.php",
									)
								);?>
							</div>
						</div>
						<div class="pull-right">
							<?=CMax::ShowPrintLink();?>
						</div>
					</div>
					<div class="copy-block col-md-6 col-sm-6 pull-left">
						<div class="copy font_xs pull-left">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/copyright.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "Copyright",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
						<div id="bx-composite-banner" class="pull-left"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>