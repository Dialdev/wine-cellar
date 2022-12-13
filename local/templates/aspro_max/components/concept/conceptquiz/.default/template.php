<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?

$wqec_copy_active = COption::GetOptionString("concept.quiz", "wqec_copy_active", false, SITE_ID);
$countElem = (!empty($arResult["ITEMS"]))?count($arResult["ITEMS"]):0;
?>

	<?if($arResult["SECTION_INFO"]["UF_CWIZ_TYPE_VIEW"]["XML_ID"] == 'second'):?>
		<div id="cquiz_id_<?=$arResult["SECTION_INFO"]["ID"]?>" class="<?if($arResult["SECTION_INFO"]["UF_STYLE_WINECELLAR"] == "1"):?>winecellar-style<?endif;?> wizard-quest-edition-concept2 wqec<?if($USER->isAdmin()):?> wqec-admin-on <?if($arParams["TYPE"] != "quiz_block"):?>show-points<?endif;?><?endif;?> <?if(isset($arResult["STYLE_QUIZ_BLOCK"]) && strlen($arResult["STYLE_QUIZ_BLOCK"])>0) echo $arResult["STYLE_QUIZ_BLOCK"];?>" data-wqec-id='<?=$arResult["SECTION_INFO"]["ID"]?>'>
			<div class="wizard-quest-edition-concept-inner">

				<?if($countElem):?>

					<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_TITLE"])>0 && $arParams["TYPE"] != "quiz_block"):?>
						<div class="wqec-maintitle"><?=$arResult["SECTION_INFO"]['~UF_CWIZ_TITLE'];?></div>
					<?endif;?>


					<div class="wqec-maincontent" <?if(isset($arResult["STYLE_ATTR_QUIZ_BLOCK"]) && strlen($arResult["STYLE_ATTR_QUIZ_BLOCK"])>0) echo $arResult["STYLE_ATTR_QUIZ_BLOCK"];?>>

						<?if($arParams["TYPE"] != "quiz_block"):?><a class="wqec-mainclose" <?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"])>0):?> href="<?=$arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"]?>" <?endif;?>></a><?endif;?>

						<form class="wqec-form wqec-calc">
							<input type="hidden" name="cwizType" value="<?=$arResult["SECTION_INFO"]["UF_CWIZ_TYPE_VIEW"]["XML_ID"]?>">
							<input type="hidden" name="cwizIblockId" value="<?=$arResult["SECTION_INFO"]['IBLOCK_ID'];?>">
							<input type="hidden" name="cwizSectionId" value="<?=$arResult["SECTION_INFO"]['ID'];?>">
							<input type="hidden" name="cwizMaxResult" value="<?=$arResult['CWIZ_MAX_RESULT']?>">
							<input type="hidden" name="cwizsite_id" value="<?=SITE_ID?>">
							<input type="hidden" class = "cwiz-url" name="cwizUrl" value="">
							<input type="hidden" class= "cwiz-yaID" value="<?=$arResult['SECTION_INFO']['UF_CWIZ_YA_ID']?>">
							<input type="hidden" class= "cwiz-yaGoalBegin" value="<?=$arResult['SECTION_INFO']['UF_CWIZ_GOAL_BEGIN']?>">
							<input type="hidden" name="wqec-soc" value="<?=$arResult["SECTION_INFO"]["UF_CWIZ_SHARE"]?>">
							<input type="hidden" class="send_res" name="cquiz-send_res" value="<?if($arResult["SECTION_INFO"]["UF_SEND_RES"]) echo "send_res"; else echo "N";?>">

							<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?><input type="hidden" name="cquiz_type_point" value="<?=$arResult["SECTION_INFO"]["UF_TYPE_CALC_ENUM"]["XML_ID"]?>"><?endif;?>


							<div class="wqec-quests wqec-active wqec-clear">

								<?$colls = 'wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12 big-image-element';?>
								<?$rightColl = false;?>
								<?foreach($arResult["ITEMS"] as $cell => $arItem):?>

									<?if(isset($arItem["PROPERTIES"]['QUEST_COMMENT']['VALUE']["TEXT"]) || strlen($arItem["PROPERTIES"]['QUEST_VIDEO']['VALUE']) > 0):?>
										<?$rightColl = true;?>
										<?break;?>
									<?endif;?>

								<?endforeach;?>

								<?if( $rightColl || ($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"] > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0) || (strlen($arResult["SECTION_INFO"]["DETAIL_PICTURE"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZ_DESC"])>0) ):?>

									<?$colls = 'wqec-col-lg-8 wqec-col-md-8 wqec-col-sm-7 wqec-col-xs-12'?>

									<?$rightColl = true;?>

								<?endif;?>


									<div class="wqec-col-table <?=$colls?> wqec-left cquiz-edit-parent">

										<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
											<div class="wqec-content-wrap<?if($cell == 0):?> wqec-active wqec-first<?endif;?>" data-step="<?=$cell?>">
												<div class="wqec-questname"><?=$arItem['PROPERTIES']['QUEST']['~VALUE'];?></div>

												<?if($USER->isAdmin()):?>
													<a target = "_blank" class="cquiz-edit" href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arItem["IBLOCK_ID"]?>&amp;type=<?=$arItem["IBLOCK_TYPE_ID"]?>&amp;ID=<?=$arItem["ID"]?>&amp;find_section_section=<?=$arItem["IBLOCK_SECTION_ID"]?>"><span><?=GetMessage("CQUIZ_EDIT_TEXT");?></span></a>
												<?endif;?>
											</div>
										<?endforeach;?>

										<div class="wqec-vertical-side-wrap">
											<div class="wqec-vertical-side">
												<div class="wqec-vertical-side-inner wqec-clear<?if($arResult["SECTION_INFO"]["UF_CWIZ_PROGR_VIEW"]["XML_ID"] == "numbers"):?> wqec-tab-num<?endif;?>">


													<?if($arResult["SECTION_INFO"]["UF_CWIZ_PROGR_VIEW"]["XML_ID"] == "numbers"):?>
														<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
															<div class="wqec-tab<?if($cell == 0):?> wqec-active wqec-first<?endif?>" data-step="<?=$cell?>"></div>
														<?endforeach;?>
													<?else:?>
														<div class="weqc-tab-percent wqec-clear">
															<?
																$perWidth = 0;
																$perWidth = round(100 / $countElem,4,PHP_ROUND_HALF_ODD);
															?>
															<input type="hidden" class="wqec-one-percent-step" value="<?=$perWidth?>">
															<input type="hidden" class="totalWqecStepPercent" value="0">
															<div class="wqec-tab-per" style="width: 0;"></div>
														</div>

														<div class="wqec-perc-info">
															<span class="wqec-per-count"><?foreach($arResult["ITEMS"] as $cell => $arItem):?><span class="wqec-per-in-count<?if($cell == 0):?> wqec-active wqec-first<?endif;?>" data-step="<?=$cell?>"><?=intval($cell+1);?></span><?endforeach;?><?=GetMessage("CWIZ_QUEST");?><?=$countElem;?></span>

														</div>

													<?endif;?>

												</div>
												<!-- /.wqec-vertical-side-inner -->
											</div>
										<!--  /.wqec-vertical-side-->
										</div>
										<!-- /.wqec-vertical-side-wrap -->


										<div class="wqec-content-wrapper">

											<?foreach($arResult["ITEMS"] as $cell => $arItem):?>

												<?

													$type = 0;
													$one_click_step = "";

													if($arItem["PROPERTIES"]['ONE_CLICK_NEXT']['VALUE'] == "Y")
														$one_click_step = "one_click_on";

													if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'answers')
													{
														$type = 1;
														$one_click_step="";
													}

													if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list')
													{
														$type = 2;
														$one_click_step = "";

														if($arItem["PROPERTIES"]['ONE_CLICK_NEXT']['VALUE'] == "Y")
															$one_click_step="one_click_on";
													}

                                                    if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'range')
                                                    {
                                                        $type = 7;
                                                        $one_click_step = "";

                                                    }
												?>
												<?$typeRangeDouble = false;?>
												<?if($arItem["PROPERTIES"]['TYPE_RANGE_DOUBLE']["VALUE_XML_ID"] == "Y" && $arItem["PROPERTIES"]['TYPE_RANGE']["VALUE_XML_ID"] == "Y"):?>
													<?$typeRangeDouble = true;?>
												<?endif;?>
												<div class="wqec-content-wrap<?if($cell == 0):?> wqec-active wqec-first<?endif;?> <?=$one_click_step?>" data-step="<?=$cell?>">


													<?if(strlen($arItem["PROPERTIES"]["QUEST_SUBTITLE"]["VALUE"]) > 0):?>
														<div class="wqec-mainuptitle"><?=$arItem["PROPERTIES"]["QUEST_SUBTITLE"]["~VALUE"]?></div>
													<?endif;?>

													<div class="wqec-elements <?if($typeRangeDouble):?>wqec-elements-range-double<?endif;?> <?if($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='two'):?>wqec-elements-big <?elseif($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='three'):?>wqec-elements-middle <?endif;?><?if($arItem["PROPERTIES"]['TYPE_RANGE']["VALUE_XML_ID"] == "Y"):?>wqec-elements-range<?endif;?> wqec-clear wqec-type<?if($type==1):?> wqec-check <?elseif($type==0):?> wqec-radio<?elseif($type==7):?> wqec-range<?else:?> wqec-list<?endif;?> <?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>wqec-pic-on<?endif;?> ">
														<?$cols = "wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12";?>

														<?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>

															<?if($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='two'):?>
																<?$cols = "wqec-col wqec-col-lg-6 wqec-col-md-6 wqec-col-sm-6 wqec-col-xs-6 wqec-big";?>

															<?elseif($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='three'):?>
																<?$cols = "wqec-col wqec-col-lg-4 wqec-col-md-4 wqec-col-sm-6 wqec-col-xs-6 wqec-middle ";?>

															<?else:?>
																<?$cols = "wqec-col wqec-col-lg-3 wqec-col-md-3 wqec-col-sm-6 wqec-col-xs-6 wqec-small";?>
															<?endif;?>

														<?endif;?>

														<div class="wqec-elements-inner">

															<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list'):?>

																<div class="wqec-select-wrap">
																	<div class="wqec-ar-down"></div>

																	<div class="wqec-choose-list wqec-first"><?=GetMessage('CWIZ_SELECT')?></div>

																		<div class="wqec-list">
															<?endif;?>


															<?if(!empty($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE'])):?>

																<?if($arItem["PROPERTIES"]['TYPE_RANGE']["VALUE_XML_ID"] == "Y"):?>
                                                                    <?if($typeRangeDouble):?>
                                                                        <input type="range" id="wqec-slider-range-double_<?=$arItem['ID']?>" class="wqec-slider-range wqec-slider-range-double" step="1" min="<?=$arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE'][1]?>" max="<?=$arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE'][2]?>" value="0" oninput="sliderDouble(this)">
                                                                    <?endif;?>
                                                                    <input type="range" id="wqec-slider-range_<?=$arItem['ID']?>" class="wqec-slider-range" step="1" min="<?if($typeRangeDouble):?><?=$arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE'][1]?><?else:?>0<?endif;?>" max="<?if($typeRangeDouble):?><?=$arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE'][2]?><?else:?><?=count($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE']) - 1?><?endif;?>" value="0" oninput="<?if($typeRangeDouble):?>sliderDouble(this)<?else:?>slider(this)<?endif;?>">
                                                                    <div id="wqec-slider-range-value_<?=$arItem['ID']?>" class="wqec-slider-range-value">0</div>
                                                                    <script>

                                                                        function sliderDouble(elem, init) {
                                                                            let sliders = elem.closest('.wqec-elements-inner').querySelectorAll('input[type="range"]');
                                                                            let sliderValue = elem.closest('.wqec-elements-inner').querySelector('.wqec-slider-range-value');
                                                                            let inputCheck = elem.closest('.wqec-elements-inner').querySelectorAll('input[name*="c_quiz"]');
                                                                            let inputAnswer = elem.closest('.wqec-elements').querySelector('input[name*="usr_cquiz"]');

                                                                            if(init) {
                                                                                inputCheck[0].click();
                                                                                console.log(inputCheck);
                                                                            }

                                                                            if(elem === sliders[0]) {
                                                                                if(+sliders[0].value > +sliders[1].value){
                                                                                    sliders[1].value = +sliders[0].value;
                                                                                }
                                                                            } else {
                                                                                if(+sliders[1].value < +sliders[0].value){
                                                                                    sliders[0].value = +sliders[1].value;
                                                                                }
                                                                            }

                                                                            if((sliders[0].value > 1 || sliders[1].value > 1) && (sliders[0].value < parseInt(elem.getAttribute('max')) || sliders[1].value < parseInt(elem.getAttribute('max')))) {
                                                                                sliderValue.textContent = `От ${sliders[0].value} до ${sliders[1].value}`
                                                                                inputAnswer.value = `От ${sliders[0].value} до ${sliders[1].value}`
                                                                            } else if((sliders[0].value <= 1 && sliders[1].value <= 1)) {
                                                                                sliderValue.textContent = inputCheck[0].nextElementSibling.nextElementSibling.textContent
                                                                                inputAnswer.value = inputCheck[0].nextElementSibling.nextElementSibling.textContent
                                                                            } else if((sliders[0].value >= parseInt(elem.getAttribute('max')) && sliders[1].value >= parseInt(elem.getAttribute('max')))) {
                                                                                sliderValue.textContent = inputCheck[3].nextElementSibling.nextElementSibling.textContent
                                                                                inputAnswer.value = inputCheck[3].nextElementSibling.nextElementSibling.textContent
                                                                            }
                                                                            sliders.forEach((slider) => {
                                                                                slider.addEventListener('change', () => {
                                                                                    console.log(`from ${sliders[0].value} to ${sliders[1].value}`);
                                                                                })
                                                                            });
                                                                        }
																		<?if($typeRangeDouble):?>
                                                                            sliderDouble(document.getElementById('wqec-slider-range-double_<?=$arItem['ID']?>'), true);
                                                                            sliderDouble(document.getElementById('wqec-slider-range_<?=$arItem['ID']?>'));
																		<?endif;?>

                                                                        function slider(elem){
                                                                            if(elem) {
                                                                                let mySlider = elem;
                                                                                let sliderValue = elem.nextElementSibling;
                                                                                let countQuestionsRange = parseInt(elem.getAttribute('max')) + 1;
                                                                                let radioCheck = mySlider.closest('.wqec-elements-inner').querySelectorAll('input[name*="c_quiz"]');
                                                                                let activeRadio = mySlider.value;

                                                                                for(let i = 0; i < radioCheck.length; i++) {
                                                                                    if(i === parseInt(activeRadio)) {
                                                                                        radioCheck[i].click()
                                                                                        sliderValue.textContent = radioCheck[i].nextElementSibling.nextElementSibling.textContent
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        <?if(!$typeRangeDouble):?>
                                                                            slider(document.getElementById('wqec-slider-range_<?=$arItem['ID']?>'));
																		<?endif;?>
                                                                    </script>
                                                                <?endif;?>

																<? foreach($arItem["PROPERTIES"]['QUEST_ANSWER']['~VALUE'] as $cell_val => $check_val):?>
																	<?//$value = $arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val];?>

																	<?//if(strlen($value) == 0 ) $value = 0;?>

																	<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list' || $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'range'):?>

																		<?
																			$countPictures = !empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])?count($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) :0;
                                                                            ?>
																		<div class="wqec-element <?if(count($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE']) == 2):?>wqec-element-h749<?elseif(count($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE']) > 2 && count($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE']) < 5):?>wqec-element-h362<?elseif(count($arItem["PROPERTIES"]['QUEST_ANSWER']['VALUE']) >= 5):?>wqec-element-h350<?endif;?> <?if($arItem["PROPERTIES"]['TYPE_RANGE']["VALUE_XML_ID"] == "Y"):?>wqec-element-hidden<?endif;?> <?=$cols?><?/*if($arResult['EMPTY_ANSWERS'] != $countPictures):?> answ-pic<?endif;*/?> <?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>cquiz-adm-parent-symb <?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])):?>cquiz-pic-on<?endif;?><?endif;?>">
																			<div class="wqec-element-inner">

																				<label class="quiz_wrap_element">
																					<?if($countPictures):?>
																						<?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'][$cell_val], array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 85);?>

																						<table class="wqec-image">
																							<tr>
																								<?if(strlen($file["src"])>0):?>
																									<td style="background: url(<?=$file["src"]?>) center no-repeat; background-size: cover;"></td>
																								<?else:?>
																									<td style="background: url(/bitrix/tools/concept.quiz/css/images/bg-answ.jpg) center no-repeat; background-size: cover;"></td>
																								<?endif;?>
																							</tr>
																						</table>
																					<?endif;?>

																					<span class="wqec-name">

                                                                                        <input class="wqec-check" type="<?if($type==1):?>checkbox<?elseif($type==0):?>radio<?endif;?>"  name="c_quiz<?=$arItem['ID']?><?if($type==1):?>[]<?endif;?>" value="<?=$cell_val?>">
														                                <span><?if($arResult["SECTION_INFO"]["UF_STYLE_WINECELLAR"] == "1" && !empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])):?>Выбрать<?endif;?></span>
														                                <span class="wqec-text bold"><?=(isset($arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val]) && strlen($arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val])>0)?$arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val]:$check_val;?></span>
																					</span>
																				</label>

																				<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>

																					<div class="cquiz-adm-symb">
																						<?=$arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val];?>
																					</div>

																				<?endif;?>


																			</div>
																		</div>

																	<?else:?>
																		<label class="quiz_wrap_element">
																			<span class="wqec-name <?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>cquiz-adm-parent-symb<?endif;?>">
																				
																				<input class="wqec-check" type="radio" name="c_quiz<?=$arItem['ID']?>" value="<?=$cell_val?>">
																				<span class="wqec-text"><?=$check_val?></span>

																				<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>

																					<div class="cquiz-adm-symb">
																						<?print_r($arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val]);?>
																					</div>

																				<?endif;?>
												                                
																			</span>
																		</label>
																	<?endif;?>

																	<?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>


																		<?if($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='two'):?>

																			<?if(($cell_val+1) % 2 == 0):?>
																				<div class="wqec-clear"></div>
																			<?endif;?>


																		<?elseif($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='three'):?>

																			<?if(($cell_val+1) % 2 == 0):?>
																				<div class="wqec-clear wqec-visible-sm wqec-visible-xs"></div>
																			<?endif;?>
																			<?if(($cell_val+1) % 3 == 0):?>
																				<div class="wqec-clear wqec-hidden-sm wqec-hidden-xs"></div>
																			<?endif;?>

																		<?else:?>

																			<?if(($cell_val+1) % 2 == 0):?>
																				<div class="wqec-clear wqec-visible-sm wqec-visible-xs"></div>
																			<?endif;?>
																			<?if(($cell_val+1) % 4 == 0):?>
																				<div class="wqec-clear"></div>
																			<?endif;?>

																		<?endif;?>


																	<?endif;?>
																<?endforeach;?>

															<?endif;?>


															<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list'):?>
																	</div>

																</div>

															<?endif;?>


														</div>

														<div class="wqec-clear"></div>
														<?if($arItem["PROPERTIES"]['QUEST_ANSWER_USER']['VALUE'] == "Y"):?>

															<div class="wqec-answer-user wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12">
																<div class="wqec-name"><?if(strlen($arItem["PROPERTIES"]['QUEST_ANSWER_USER_DESC']['VALUE'])>0):?><?=$arItem["PROPERTIES"]['QUEST_ANSWER_USER_DESC']['~VALUE']?><?else:?><?=GetMessage('CWIZ_ANSWER_USERS')?><?endif;?></div>
																<div class="wqec-input wqec-last">
						                                        	<div class="wqec-inp-bg"></div>
						                                            <input class="input-text wqec-text wqec-text-style" type="text" name="usr_cquiz<?=$arItem["ID"]?>">
						                                        </div>
															</div>

														<?endif;?>

													</div>

													<?if($arItem["PROPERTIES"]['QUEST_SKIP']['VALUE'] == "Y"):?>
														<div class="wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12">
															<div class="wqec-skip wqec-prev-next wqec-next <?if($countElem == $cell+1) echo "stepEnd";?>" data-step = "<?=$cell+1;?>"><?=GetMessage("CWIZ_SKIP");?></div>
														</div>
													<?endif;?>

													<div class="wqec-button-wrap wqec-hide-relative">


														<div class="wqec-button-inner wqec-left">
															<button type="button" class="wqec-button-def wqec-gray wqec-prev-next wqec-prev<?if($cell == 0):?> wqec-hide<?endif;?>" data-step="<?=$cell-1;?>">
																<?if($arResult["SECTION_INFO"]["UF_STYLE_WINECELLAR"] == "1"):?>
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.43923 10.9394L13.9392 3.43935L16.0605 5.56067L9.62121 12L16.0605 18.4393L13.9392 20.5607L6.43923 13.0607C5.85344 12.4749 5.85344 11.5251 6.43923 10.9394Z" fill="white"/>
                                                                </svg>
                                                                <?else:?>
                                                                    &larr;
																<?endif;?>
                                                                <?=GetMessage("CWIZ_PREV");?>
                                                            </button>
														</div>

                                                        <div class="wqec-button-inner wqec-center">
                                                            <span class="wqec-count-progress"><?=$cell+1?> из <?= count($arResult["ITEMS"])?></span>
                                                        </div>

														<div class="wqec-button-inner wqec-right">

															<button type="button" class="wqec-button-def wqec-blue wqec-prev-next wqec-leaking wqec-next <?if($cell == 0):?>wqec-first<?endif;?> <?if($countElem == $cell+1) echo "stepEnd";?>" data-step="<?=$cell+1;?>"><?if($countElem != $cell+1):?><?=GetMessage("CWIZ_NEXT");?>
																	<?if($arResult["SECTION_INFO"]["UF_STYLE_WINECELLAR"] == "1"):?>
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5606 13.0606L10.0607 20.5606L7.93933 18.4393L14.3787 12L7.93933 5.56065L10.0607 3.43933L17.5606 10.9393C18.1464 11.5251 18.1464 12.4749 17.5606 13.0606Z" fill="white"/>
                                                                        </svg>
																	<?else:?>
                                                                        &rarr;
																	<?endif;?>
																<?else:?><?if(strlen($arResult["SECTION_INFO"]["UF_USER_BTN_RESULT"])>0) echo $arResult["SECTION_INFO"]["UF_USER_BTN_RESULT"]; else echo GetMessage("CWIZ_RESULT_CALC");?><?endif;?><div class="wqec_shine"></div></button>
														</div>
														<?if($arItem["PROPERTIES"]['TYPE_INPUT']['VALUE'] == 'Y' && $arItem["PROPERTIES"]['IMPORTANT']['VALUE'] == 'Y'):?><div><?=GetMessage("CWIZ_VALID_NEXT");?></div><?endif;?>


													</div>



												</div>
											<?endforeach;?>

										</div>


									</div>

								<?if($rightColl):?>



									<div class="wqec-col-table wqec-col-lg-4 wqec-col-md-4 wqec-col-sm-5 wqec-col-xs-12 wqec-right">

										<?if($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"] > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0):?>
											<div class="wqec-row">
												<div class="wqec-main-info-wrap">
													<table class="wqec-main-info">
														<tr>
															<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"])>0):?>
																<td class="wqec-image">

																	<?$file = CFile::ResizeImageGet($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, false, false, false, 85);?>
						                                            <img alt="" class="wqec-responsive" src="<?=$file["src"]?>" />

																</td>
															<?endif;?>

															<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0):?>
																<td>
																	<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0):?>
																		<div class="wqec-info-name bold"><?=$arResult["SECTION_INFO"]["~UF_CWIZARD_NAME"]?></div>
																	<?endif;?>
																	<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0):?>
																		<div class="wqec-info-desc"><?=$arResult["SECTION_INFO"]["~UF_CWIZARD_PROF"]?></div>
																	<?endif;?>
																</td>
															<?endif;?>
														</tr>
													</table>
												</div>
											</div>

										<?endif;?>

										<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
											<div class="wqec-content-wrap<?if($cell == 0):?> wqec-active wqec-first<?endif;?>" data-step="<?=$cell?>">

												<?if(isset($arItem["PROPERTIES"]['QUEST_COMMENT']['VALUE'])):?>
													<div class="wqec-comment">
													<div class="wqec-ar-comment"><div class="wqec-ar-white"></div></div>
													<?=(isset($arItem["PROPERTIES"]['QUEST_COMMENT']['VALUE']["TEXT"]))?$arItem["PROPERTIES"]['QUEST_COMMENT']['~VALUE']["TEXT"]:""?></div>
												<?endif;?>

												<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO']['VALUE']) > 0):?>
													<div class="wqec-video">
														<?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem["PROPERTIES"]["QUEST_VIDEO"]["VALUE"],$out);?>

														<a class="wqec-link-video" data-wqec-video="<?=$out[1]?>">
															<table class="wqec-pl-video">
		                                                       <tr>
		                                                       <?$file["src"] = '';?>

		                                                       	<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO_PIC']['VALUE'])>0):?>
		                                                       		<?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['QUEST_VIDEO_PIC']['VALUE'], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, false, false, false, 85);?>

		                                                       	<?endif;?>

			                                                        <td class="wqec-img" style="background-image: url('<?=$file["src"]?>');">
			                                                            <div class="wqec-pl-butt">
			                                                                <span></span>
			                                                            </div>
			                                                        </td>

			                                                        <?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO_DESC']['VALUE']) > 0):?>

				                                                        <td class="wqec-video-desc">
																			<div class="wqec-video-text">
																				<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO_DESC']['VALUE']) > 0):?>
																					<?=$arItem["PROPERTIES"]['QUEST_VIDEO_DESC']['~VALUE']?>
																				<?else:?>
																					<?=GetMessage("CWIZ_VIDEO_DESC");?>
																				<?endif;?>
																			</div>

				                                                        </td>

			                                                        <?endif;?>

		                                                        </tr>
		                                                    </table>
														</a>
													</div>
												<?endif;?>
											</div>

										<?endforeach;?>

										<?if(strlen($arResult["SECTION_INFO"]["DETAIL_PICTURE"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZ_DESC"])>0):?>

											<div class="wqec-logo">
												<div class="wqec-table">

													<?if(strlen($arResult["SECTION_INFO"]["DETAIL_PICTURE"])>0):?>
														<div class="wqec-cell">
															<img src="<?=CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>" alt="logo" class="wqec-logo wqec-responsive wqec-center-block" />
														</div>

													<?endif;?>
													<div class="wqec-main-desc wqec-cell">
													<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_DESC"])>0):?>
														<?=$arResult["SECTION_INFO"]["~UF_CWIZ_DESC"]?>
													<?endif;?>
													</div>

												</div>
											</div>

										<?endif;?>

									</div>

								<?endif;?>



							</div>
							<!-- /.wqec-quests -->



							<div class="wqec-content-wrap" data-step="stepEnd">


							</div>
							<!-- /.wqec-content-wrap -->

							<input type="hidden" class="wqec-send-info" name="wqec-send-info">

						</form>



						<?if($wqec_copy_active == 'Y'):?><a href='http://quiz360.ru/' target="_blank" class="wqec-copyright"></a><?endif;?>

					</div>
				<?endif;?>


				<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>
					<div class="wqec-wrap-refresh wqec-hidden-sm wqec-hidden-xs">
						<div class="wqec-refresh call-wqec-menu" data-wqec-section-id="<?=$arResult["SECTION_INFO"]["ID"]?>"><?=GetMessage("CWIZ_REFRESH");?></div><div class="desc"><?=GetMessage("CWIZ_REFRESH_DESC");?></div>
					</div>
					<div class="wrap-cquiz-cur-result">
						<div class="wqec-hidden-sm wqec-hidden-xs cquiz-cur-result cquiz-cur-style">
							<div class="cquiz-tit"><?=GetMessage("CQUIZ_CUR_RES");?></div>
							<div class="area-for-total"><?=GetMessage("CQUIZ_CUR_RES_EMPTY");?></div>
						</div>
						<div class="cquiz-res-footer"><?=GetMessage("CQUIZ_CUR_RES_FOOTER");?></div>
					</div>
				<?endif;?>
				<div class="wqec-tbl">
					<?if($arResult["SECTION_INFO"]["UF_CWIZ_SHARE"]):?>

						<div class="wqec-cell wqec-left">
							<a class="wqec-share wqec-soc quiz_ic-vk" data-wqec-name="vk" data-wqec-title="<?=$arResult['SECTION_INFO']['~NAME']?>" data-wqec-image="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>"></a>
							<a class="wqec-share wqec-soc quiz_ic-tw" data-wqec-name="tw" data-wqec-title="<?=$arResult['SECTION_INFO']['~NAME']?>"></a>
							<a class="wqec-share wqec-soc quiz_ic-fb" data-wqec-name="fb" data-wqec-image="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>"></a>
							<a class="wqec-share wqec-soc quiz_ic-ok" data-wqec-name="ok"></a>
						</div>
					<?endif;?>

					<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_SHARE_TEXT"])>0):?>
						<div class="wqec-cell">
							<?=$arResult["SECTION_INFO"]["~UF_CWIZ_SHARE_TEXT"]?>
						</div>
					<?endif;?>

				</div>

			</div>
			<!-- /.wizard-quest-edition-concept-inner -->


		</div>
		<!-- /.wizard-quest-edition-concept2 -->

	<?else:?>
		<div id="cquiz_id_<?=$arResult["SECTION_INFO"]["ID"]?>" class="wizard-quest-edition-concept wqec <?if($USER->isAdmin()):?> wqec-admin-on <?if($arParams["TYPE"] != "quiz_block"):?>show-points<?endif;?><?endif;?>" data-wqec-id='<?=$arResult["SECTION_INFO"]["ID"]?>'>

			<?if(strlen($arResult["SECTION_INFO"]["PICTURE"])>0):?>
				<?$img = CFile::ResizeImageGet($arResult["SECTION_INFO"]["PICTURE"], array('width'=>1000, 'height'=>1600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 80);?>
			<?endif;?>

			<div class="wqec-left-side"<?if(!empty($img) && is_array($img)):?> style="background-image: url('<?=$img['src']?>');" <?endif;?>>

				<div class="wqec-shadow-img"></div>
				<div class="wqec-left-side-inner">
					<?if(strlen($arResult["SECTION_INFO"]["DETAIL_PICTURE"])>0):?>
						<div class="wqec-logo">
							<img src="<?=CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>" alt="logo" class="wqec-logo wqec-responsive wqec-center-block" />
						</div>
					<?endif;?>
					<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_DESC"])>0):?>
						<div class="wqec-maindesc"><?=$arResult["SECTION_INFO"]["~UF_CWIZ_DESC"]?></div>
					<?endif;?>



					<div class="wqec-wrap-refresh wqec-hidden-sm wqec-hidden-xs">
						<?if($USER->isAdmin()):?>
							<div class="wqec-refresh call-wqec-menu" data-wqec-section-id="<?=$arResult["SECTION_INFO"]["ID"]?>"><?=GetMessage("CWIZ_REFRESH");?></div><div class="desc"><?=GetMessage("CWIZ_REFRESH_DESC");?></div>

							<div class="wrap-cquiz-cur-result">
								<div class="wqec-hidden-sm wqec-hidden-xs cquiz-cur-result cquiz-cur-style">
									<div class="cquiz-tit"><?=GetMessage("CQUIZ_CUR_RES");?></div>
									<div class="area-for-total"><?=GetMessage("CQUIZ_CUR_RES_EMPTY");?></div>
								</div>
								<div class="cquiz-res-footer"><?=GetMessage("CQUIZ_CUR_RES_FOOTER");?></div>
							</div>
						<?endif;?>

						<?if($wqec_copy_active == 'Y'):?><a href='http://quiz360.ru/' target="_blank" class="wqec-copyright"></a><?endif;?>
					</div>

					<!-- /.wqec-left-side-button-wrap -->


				</div>
				<!-- /.wqec-left-side-inner -->
			</div>
			<!-- /.wqec-left-side -->

			<div class="wqec-right-side">
				<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_TITLE"])>0):?><a <?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"])>0):?> href="<?=$arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"]?>" <?endif;?> class="wqec-mainclose"></a><?endif?>

				<div class="wqec-right-side-static-part">
					<div class="quiz-head-part">

						<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_TITLE"])>0):?>
							<div class="wqec-maintitle"><?=$arResult["SECTION_INFO"]['~UF_CWIZ_TITLE'];?></div>
						<?endif;?>

						<div class="wqec-vertical-side-wrap">
							<div class="wqec-vertical-side">
								<div class="wqec-vertical-side-inner wqec-clear<?if($arResult["SECTION_INFO"]["UF_CWIZ_PROGR_VIEW"]["XML_ID"] == "numbers"):?> wqec-tab-num<?endif;?>">

									<?if($countElem):?>
										<?if($arResult["SECTION_INFO"]["UF_CWIZ_PROGR_VIEW"]["XML_ID"] == "numbers"):?>

											<?foreach($arResult["ITEMS"] as $cell => $arItem):?>

												<div class="wqec-tab<?if($cell == 0):?> wqec-active wqec-first<?endif?>" data-step="<?=$cell?>"></div>

											<?endforeach;?>

											<div class="wqec-tab-result" data-step="stepEnd"><?=GetMessage("CWIZ_RESULT_CALC");?></div>

										<?else:?>


											<div class="weqc-tab-percent wqec-clear">
												<?
													$perWidth = 0;
													$perWidth = round(100 / $countElem,4,PHP_ROUND_HALF_ODD);
												?>
												<input type="hidden" class="wqec-one-percent-step" value="<?=$perWidth?>">
												<input type="hidden" class="totalWqecStepPercent" value="0">

												<div class="wqec-tab-per" style="width: 0;"></div>

											</div>

											<div class="wqec-perc-info">
												<span class="wqec-per-count"><?foreach($arResult["ITEMS"] as $cell => $arItem):?><span class="wqec-per-in-count<?if($cell == 0):?> wqec-active wqec-first<?endif;?>" data-step="<?=$cell?>"><?=intval($cell+1);?></span><?endforeach;?><?=GetMessage("CWIZ_QUEST");?><?=$countElem;?></span>
												<span class="wqec-finish wqec-hide"></span>
											</div>



										<?endif;?>
									<?endif;?>


									<!-- <div class="wqec-restart wqec-hide"></div> -->
								</div>
								<!-- /.wqec-vertical-side-inner -->
							</div>
						<!--  /.wqec-vertical-side-->
						</div>

					</div>

					<div class="quiz-body-part">
						<div class="inner-quiz-body-part">

							<form class="wqec-form wqec-calc">
								<input type="hidden" name="cwizType" value="<?=$arResult["SECTION_INFO"]["UF_CWIZ_TYPE_VIEW"]["XML_ID"]?>">
								<input type="hidden" name="cwizIblockId" value="<?=$arResult["SECTION_INFO"]['IBLOCK_ID']?>">
								<input type="hidden" name="cwizSectionId" value="<?=$arResult["SECTION_INFO"]['ID']?>">
								<input type="hidden" name="cwizMaxResult" value="<?=$arResult['CWIZ_MAX_RESULT']?>">
								<input type="hidden" name="cwizsite_id" value="<?=SITE_ID?>">
								<input type="hidden" name="cwizUrl" class= "cwiz-url" value="">
								<input type="hidden" class= "cwiz-yaID" value="<?=$arResult['SECTION_INFO']['UF_CWIZ_YA_ID']?>">
								<input type="hidden" class= "cwiz-yaGoalBegin" value="<?=$arResult['SECTION_INFO']['UF_CWIZ_GOAL_BEGIN']?>">
								<input type="hidden" name="wqec-soc" value="<?=$arResult["SECTION_INFO"]["UF_CWIZ_SHARE"]?>">
								<input type="hidden" class="send_res" name="cquiz-send_res" value="<?if($arResult["SECTION_INFO"]["UF_SEND_RES"]) echo "send_res"; else echo "N";?>">
								<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?><input type="hidden" name="cquiz_type_point" value="<?=$arResult["SECTION_INFO"]["UF_TYPE_CALC_ENUM"]["XML_ID"]?>"><?endif;?>




								<div class="wqec-content">
									<?if(!empty($arResult["ITEMS"])):?>


											<div class="wqec-row wqec-clear wqec-quests wqec-active">

												<?
													$class_right = "";
													$class_left = "wqec-col-lg-9 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12 big-image-element";

													if($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"] > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"]) > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"]) > 0 || !empty($arItem["PROPERTIES"]['QUEST_COMMENT']['VALUE']) || strlen($arItem["PROPERTIES"]['QUEST_VIDEO']['VALUE']) > 0)
													{
														$class_right = "wqec-col wqec-col-lg-4 wqec-col-md-5 wqec-col-sm-12 wqec-col-xs-12";
														$class_left = "wqec-col-lg-8 wqec-col-md-7 wqec-col-sm-12 wqec-col-xs-12";
													}
												?>


												<div class="wqec-col <?=$class_left?>">
													<div class="wqec-content-wrapper">

														<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
															<?

																$type = 0;
																$one_click_step = "";

																if($arItem["PROPERTIES"]['ONE_CLICK_NEXT']['VALUE'] == "Y")
																	$one_click_step = "one_click_on";

																if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'answers')
																{
																	$type = 1;
																	$one_click_step="";
																}

																if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list')
																{
																	$type = 2;

																	$one_click_step = "";

																	if($arItem["PROPERTIES"]['ONE_CLICK_NEXT']['VALUE'] == "Y")
																		$one_click_step="one_click_on";
																}
															?>

															<div class="wqec-content-wrap<?if($cell == 0):?> wqec-active wqec-first<?endif;?> <?=$one_click_step?> cquiz-edit-parent" data-step="<?=$cell?>">

																<?if(strlen($arItem['PROPERTIES']['QUEST']['VALUE']) > 0):?>

																	<div class="wqec-questname wqec-bold">
																		<?=$arItem['PROPERTIES']['QUEST']['~VALUE'];?>
																	</div>

																<?endif;?>

																<?if(strlen($arItem["PROPERTIES"]["QUEST_SUBTITLE"]["VALUE"]) > 0):?>

																	<div class="wqec-mainuptitle"><?=$arItem["PROPERTIES"]["QUEST_SUBTITLE"]["~VALUE"]?></div>

																<?endif;?>

																<div class="wqec-elements wqec-clear wqec-type<?if($type==1):?> wqec-check <?elseif($type==0):?> wqec-radio<?else:?> wqec-list<?endif;?> <?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>wqec-pic-on<?endif;?>">
																		<?$cols = "wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12";?>

																		<?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>

																			<?if($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='two'):?>
																				<?$cols = "wqec-col wqec-col-lg-6 wqec-col-md-6 wqec-col-sm-6 wqec-col-xs-6 wqec-big";?>

																			<?elseif($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='three'):?>
																				<?$cols = "wqec-col wqec-col-lg-4 wqec-col-md-4 wqec-col-sm-6 wqec-col-xs-6 wqec-middle";?>

																			<?else:?>
																				<?$cols = "wqec-col wqec-col-lg-3 wqec-col-md-3 wqec-col-sm-6 wqec-col-xs-6 wqec-small";?>
																			<?endif;?>

																		<?endif;?>

																			<div class="wqec-elements-inner">
																				<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list'):?>

																					<div class="wqec-select-wrap">
																						<div class="wqec-ar-down"></div>

																						<div class="wqec-choose-list wqec-first"><?=GetMessage('CWIZ_SELECT')?></div>

																							<div class="wqec-list">
																				<?endif;?>

																				<?if(!empty($arItem["PROPERTIES"]['QUEST_ANSWER']['~VALUE'])):?>

																					<?foreach($arItem["PROPERTIES"]['QUEST_ANSWER']['~VALUE'] as $cell_val => $check_val):?>
																						<?//$value = $arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val];?>

																						<?//if(strlen($value) == 0 ) $value = 0;?>

																						<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>

																							<?
																								$countPictures = !empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])?count($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) :0;
																							?>

																							<div class="wqec-element <?=$cols?><?/*if($arResult['EMPTY_ANSWERS'] == $countPictures):?> answ-pic<?endif;*/?> <?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>cquiz-adm-parent-symb <?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])):?>cquiz-pic-on<?endif;?><?endif;?>">
																								<div class="wqec-element-inner">


																									<label class="quiz_wrap_element">
																										<?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'])):?>


																											<?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE'][$cell_val], array('width'=>700, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 85);?>

																											<table class="wqec-image">
																												<tr>
																													<?if(strlen($file["src"])>0):?>
																														<td style="background: url(<?=$file["src"]?>) center no-repeat; background-size: cover;"></td>
																													<?else:?>
																														<td style="background: url(/bitrix/tools/concept.quiz/css/images/bg-answ.jpg) center no-repeat; background-size: cover;"></td>
																													<?endif;?>
																												</tr>
																											</table>
																										<?endif;?>

																										<span class="wqec-name">
																											<input class="wqec-check" type="<?if($type==1):?>checkbox<?elseif($type==0):?>radio<?endif;?>" name="c_quiz<?=$arItem['ID']?><?if($type==1):?>[]<?endif;?>" value="<?=$cell_val?>">
																			                                <span></span>
																			                                <span class="wqec-text bold"><?=(isset($arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val]) && strlen($arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val])>0)?$arItem["PROPERTIES"]['QUEST_PICTURES']['DESCRIPTION'][$cell_val]:$check_val;?></span>
																										</span>

																									</label>

																									<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>

																										<div class="cquiz-adm-symb">
																											<?=$arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val];?>
																										</div>

																									<?endif;?>


																								</div>
																							</div>

																						<?else:?>
																							<label class="quiz_wrap_element">
																								<span class="wqec-name <?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>cquiz-adm-parent-symb<?endif;?>">
																									
																									<input class="wqec-check" type="radio" name="c_quiz<?=$arItem['ID']?>" value="<?=$cell_val?>">
																									<span class="wqec-text"><?=$check_val?></span>

																									<?if($USER->isAdmin() && $arParams["TYPE"] != "quiz_block"):?>

																										<div class="cquiz-adm-symb">
																											<?print_r($arItem["PROPERTIES"]['QUEST_ANSWER']['DESCRIPTION'][$cell_val]);?>
																										</div>

																									<?endif;?>
																	                                
																								</span>
																							</label>
																						<?endif;?>

																						<?if(!empty($arItem["PROPERTIES"]['QUEST_PICTURES']['VALUE']) && $arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] != 'list'):?>


																							<?if($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='two'):?>

																								<?if(($cell_val+1) % 2 == 0):?>
																									<div class="wqec-clear"></div>
																								<?endif;?>


																							<?elseif($arItem["PROPERTIES"]['QUEST_COUNT']['VALUE_XML_ID'] =='three'):?>

																								<?if(($cell_val+1) % 2 == 0):?>
																									<div class="wqec-clear wqec-visible-sm wqec-visible-xs"></div>
																								<?endif;?>
																								<?if(($cell_val+1) % 3 == 0):?>
																									<div class="wqec-clear wqec-hidden-sm wqec-hidden-xs"></div>
																								<?endif;?>

																							<?else:?>

																								<?if(($cell_val+1) % 2 == 0):?>
																									<div class="wqec-clear wqec-visible-sm wqec-visible-xs"></div>
																								<?endif;?>
																								<?if(($cell_val+1) % 4 == 0):?>
																									<div class="wqec-clear wqec-hidden-sm wqec-hidden-xs"></div>
																								<?endif;?>

																							<?endif;?>


																						<?endif;?>
																					<?endforeach;?>

																				<?endif;?>
																				<?if($arItem["PROPERTIES"]['QUEST_TYPE']['VALUE_XML_ID'] == 'list'):?>
																							</div>

																					</div>

																				<?endif;?>




																			</div>

																			<div class="wqec-clear"></div>

																			<?if($arItem["PROPERTIES"]['QUEST_ANSWER_USER']['VALUE'] == "Y"):?>

																				<div class="wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12">
																					<div class="wqec-name">
																					<?if(strlen($arItem["PROPERTIES"]['QUEST_ANSWER_USER_DESC']['VALUE'])>0):?><?=$arItem["PROPERTIES"]['QUEST_ANSWER_USER_DESC']['~VALUE']?><?else:?><?=GetMessage('CWIZ_ANSWER_USERS')?><?endif;?>
																					</div>
																					<div class="wqec-input wqec-last">
											                                        	<div class="wqec-inp-bg"></div>
											                                            <input class="input-text wqec-text wqec-text-style" type="text" name="usr_cquiz<?=$arItem['ID']?>">
											                                        </div>
																				</div>

																			<?endif;?>

																	</div>

																<?if($arItem["PROPERTIES"]['QUEST_SKIP']['VALUE'] == "Y"):?>
																	<div class="wqec-col-lg-12 wqec-col-md-12 wqec-col-sm-12 wqec-col-xs-12">
																		<div class="wqec-skip wqec-prev-next wqec-next <?if($countElem == $cell+1) echo "stepEnd";?>" data-step = "<?=$cell+1;?>"><?=GetMessage("CWIZ_SKIP");?></div>
																	</div>
																<?endif;?>

																<div class="wqec-button-wrap wqec-hide-relative">

																	<?if($cell != 0):?>
																	<button type="button" class="wqec-button-def wqec-gray wqec-prev-next wqec-prev" data-step="<?=$cell-1;?>">&larr; <?=GetMessage("CWIZ_PREV");?></button>
																	<?endif;?>

																	<button type="button" class="wqec-button-def wqec-blue wqec-prev-next wqec-leaking wqec-next<?if($cell == 0):?> wqec-first<?endif;?> <?if($countElem == $cell+1) echo "stepEnd";?>" data-step="<?=$cell+1;?>"><?if($countElem != $cell+1):?><?=GetMessage("CWIZ_NEXT");?> &rarr;<?else:?><?if(strlen($arResult["SECTION_INFO"]["UF_USER_BTN_RESULT"])>0) echo $arResult["SECTION_INFO"]["UF_USER_BTN_RESULT"]; else echo GetMessage("CWIZ_RESULT_CALC");?><?endif;?><div class="wqec_shine"></div></button>

																</div>


																<?if($USER->isAdmin()):?>
																	<a target = "_blank" class="cquiz-edit" href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arItem["IBLOCK_ID"]?>&amp;type=<?=$arItem["IBLOCK_TYPE_ID"]?>&amp;ID=<?=$arItem["ID"]?>&amp;find_section_section=<?=$arItem["IBLOCK_SECTION_ID"]?>"><span><?=GetMessage("CQUIZ_EDIT_TEXT");?></span></a>
																<?endif;?>


															</div>
														<?endforeach;?>

													</div>

												</div>


												<?if(strlen($class_right)>0):?>
													<div class="<?=$class_right?>">

														<div class="wqec-wrap-right">


															<?if($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"] > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"]) > 0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"]) > 0):?>
																<div class="wqec-row">

																	<div class="wqec-main-info-wrap">
																		<table class="wqec-main-info">
																			<tr>
																				<?if($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"]>0):?>
																					<td class="wqec-image">

																						<?$file = CFile::ResizeImageGet($arResult["SECTION_INFO"]["UF_CWIZARD_PIC"], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, false, false, false, 85);?>
											                                            <img alt="" class="img-responsive" src="<?=$file["src"]?>" />

																					</td>
																				<?endif;?>

																				<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0 || strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0):?>
																					<td>
																						<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_NAME"])>0):?>
																							<div class="wqec-info-name bold"><?=$arResult["SECTION_INFO"]["~UF_CWIZARD_NAME"]?></div>
																						<?endif;?>
																						<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZARD_PROF"])>0):?>
																							<div class="wqec-info-desc"><?=$arResult["SECTION_INFO"]["~UF_CWIZARD_PROF"]?></div>
																						<?endif;?>
																					</td>
																				<?endif;?>
																			</tr>
																		</table>
																	</div>
																</div>

															<?endif;?>

															<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
																<div class="wqec-content-wrap<?if($cell == 0):?> wqec-active wqec-first<?endif;?>" data-step="<?=$cell?>">

																	<?if(!empty($arItem["PROPERTIES"]['QUEST_COMMENT']['VALUE']) > 0):?>
																		<div class="wqec-comment">
																		<div class="wqec-ar-comment"><div class="wqec-ar-white"></div></div>
																		<?=$arItem["PROPERTIES"]['QUEST_COMMENT']['~VALUE']["TEXT"]?></div>
																	<?endif;?>

																	<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO']['VALUE']) > 0):?>
																		<div class="wqec-video">
																			<?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/", $arItem["PROPERTIES"]["QUEST_VIDEO"]["VALUE"], $out);?>

																			<a class="wqec-link-video" data-wqec-video="<?=$out[1]?>">
																				<table class="wqec-pl-video">
							                                                       <tr>
							                                                       <?$file["src"] = '';?>

							                                                       	<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO_PIC']['VALUE'])>0):?>
							                                                       		<?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['QUEST_VIDEO_PIC']['VALUE'], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, false, false, false, 85);?>

							                                                       	<?endif;?>

								                                                        <td class="wqec-img" style="background-image: url('<?=$file["src"]?>');">
								                                                            <div class="wqec-pl-butt">
								                                                                <span></span>
								                                                            </div>
								                                                        </td>

								                                                    	<td class="wqec-video-desc">
																							<div class="wqec-video-text">
																								<?if(strlen($arItem["PROPERTIES"]['QUEST_VIDEO_DESC']['VALUE']) > 0):?>
																									<?=$arItem["PROPERTIES"]['QUEST_VIDEO_DESC']['~VALUE']?>
																								<?else:?>
																									<?=GetMessage("CWIZ_VIDEO_DESC");?>
																								<?endif;?>
																							</div>
								                                                        </td>

							                                                        </tr>
							                                                    </table>
																			</a>
																		</div>
																	<?endif;?>
																</div>

															<?endforeach;?>

														</div>
													</div>
												<?endif;?>


											</div>
											<!-- /.wqec-row -->

									<?endif;?>

									<div class="wqec-content-wrap" data-step="stepEnd">


									</div>
									<!-- /.wqec-content-wrap -->
								</div>
								<!-- /.wqec-content -->
								<input type="hidden" class="wqec-send-info" name="wqec-send-info">
							</form>
							<!--  /.wqec-form-->

							<div class="wqec-footer">
								<div class="wqec-row">
									<div class="wqec-tbl">
										<?if($arResult["SECTION_INFO"]["UF_CWIZ_SHARE"]):?>
											<div class="wqec-cell wqec-left">
												<a class="wqec-share wqec-soc quiz_ic-vk" data-wqec-name="vk" data-wqec-title="<?=$arResult['SECTION_INFO']['~NAME']?>" data-wqec-image="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>"></a>
												<a class="wqec-share wqec-soc quiz_ic-tw" data-wqec-name="tw" data-wqec-title="<?=$arResult['SECTION_INFO']['~NAME']?>"></a>
												<a class="wqec-share wqec-soc quiz_ic-fb" data-wqec-name="fb" data-wqec-image="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].CFile::GetPath($arResult["SECTION_INFO"]["DETAIL_PICTURE"])?>"></a>
												<a class="wqec-share wqec-soc quiz_ic-ok" data-wqec-name="ok"></a>
											</div>
										<?endif;?>

										<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_SHARE_TEXT"])>0):?>
											<div class="wqec-cell wqec-col wqec-col-xs-12">
												<?=$arResult["SECTION_INFO"]["~UF_CWIZ_SHARE_TEXT"]?>
											</div>
										<?endif;?>

										<?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_TITLE"])==0):?>

											<div class="wqec-cell wqec-col wqec-col-xs-4">
												<a <?if(strlen($arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"])>0):?> href="<?=$arResult["SECTION_INFO"]["UF_CWIZ_LINK_CLOSE"]?>" <?endif;?> class="wqec-mainclose">
													<?=GetMessage("CWIZ_CLOSE");?>
												</a>
											</div>

										<?endif?>
									</div>
								</div>
							</div>
							<!-- /.wqec-footer -->

						</div>

					</div>

				</div>
				<!-- /.wqec-right-side-static-part -->


			</div>
			<!-- /.wqec-right-side -->

		</div>
		<!-- /.wizard-quest-edition-concept -->

	<?endif;?>


	<?if(strlen($arResult["SECTION_INFO"]["DESCRIPTION"])>0):?>
		<div class="wqec-agree-shadow"></div>
		<div class="wqec-modal wqec-agreement" data-agreemodal="wqec-agree<?=$arResult["SECTION_INFO"]["ID"]?>">

			<div class="wqec-dialog">
				<a class="wqec-close"></a>
				<div class="wqec-content">

				<?=$arResult["SECTION_INFO"]["~DESCRIPTION"]?>

	            </div>

			</div>
		</div>
	<?endif;?>



	<?if($arResult["SECTION_INFO"]["UF_QUIZ_MASK"] > 0):?>
		<?

		    $arMask["rus"] = "+7 (999) 999-99-99";
		    $arMask["ukr"] = "+380 (99) 999-99-99";
		    $arMask["blr"] = "+375 (99) 999-99-99";
		    $arMask["kz"] = "+7 (999) 999-99-99";
		    $arMask["user"] = $arResult["SECTION_INFO"]["UF_QUIZ_USER_MASK"];
		?>

		<script type="text/javascript">
		    /*mask phone*/
		    $(document).on("focus", "#cquiz_id_<?=$arResult["SECTION_INFO"]["ID"]?> input.wqec-phone",
		        function()
		        {
		            if(!device.android())
		                $(this).mask("<?=$arMask[$arResult["SECTION_INFO"]["UF_QUIZ_MASK_ENUM"]["XML_ID"]]?>");
		        }
		    );
		</script>

	<?endif;?>