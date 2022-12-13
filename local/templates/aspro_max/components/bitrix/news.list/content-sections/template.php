<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="form-action-wrapper">
		<div class="form-action">
			<div class="form-action__inner bordered rounded2 box-shadow animate-load" data-event="jqm" data-param-form_id="CALLBACK" data-name="CALLBACK">
			<i class="svg  svg-inline-icon colored" aria-hidden="true"><svg width="18" height="18" viewBox="0 0 18 18"><path data-name="Shape 915 copy 16" class="cls-1" d="M1675.69,597.707l-4.3,4.291H1674a1,1,0,0,1,0,2h-5a1,1,0,0,1-1-1v-5a1,1,0,0,1,2,0v2.543l4.26-4.26A1.01,1.01,0,0,1,1675.69,597.707Zm-8.11,16.264a8.9,8.9,0,0,1-4.36-2.409c-0.35-.367-0.8-0.727-1.21-1.156h0l-0.64-.686h0c-0.4-.435-0.74-0.92-1.09-1.287a9.933,9.933,0,0,1-2.25-4.649,5.628,5.628,0,0,1,1.67-4.627c1.95-1.926,3.6-1.073,4.56-.065a5.46,5.46,0,0,1,1.71,3.785c-0.03,1.845-1.18,2.391-.96,2.584,0.08,0.071.23,0.244,0.4,0.427l0.64,0.685a5.412,5.412,0,0,1,.4.43c0.19,0.236.7-1,2.43-1.025a3.56,3.56,0,0,1,3.09,1.342,3.332,3.332,0,0,1-.06,4.865A4.921,4.921,0,0,1,1667.58,613.971Zm3.33-4.872a2.043,2.043,0,0,0-1.69-1.105,2.271,2.271,0,0,0-2.39.891c-0.66.713-1.25-.121-2.12-1.034l-0.65-.686c-0.85-.935-1.63-1.561-0.97-2.264a2.436,2.436,0,0,0,.94-2.393,4.038,4.038,0,0,0-1.44-2.463,1.665,1.665,0,0,0-1.79.47,3.94,3.94,0,0,0-.8,2.894,7.779,7.779,0,0,0,1.52,3.62c0.23,0.263.63,0.8,1.13,1.32l0.65,0.686c0.49,0.533.99,0.966,1.23,1.206a7.023,7.023,0,0,0,3.4,1.741,3.056,3.056,0,0,0,2.54-.972A1.955,1.955,0,0,0,1670.91,609.1Z" transform="translate(-1658 -596)"></path></svg></i>						
			<div class="form-action__text font_xs">Узнать информацию</div>
		</div>
	</div>
</div>
<?if($arResult['SECTIONS']):?>
	<div class="item-views content-sections1 ">
		<div class="items row margin0 list_block">
			<?foreach($arResult['SECTIONS'] as $arItem):?>
				<?
				// edit/add/delete buttons for edit mode
				$arSectionButtons = CIBlock::GetPanelButtons($arItem['IBLOCK_ID'], 0, $arItem['ID'], array('SESSID' => false, 'CATALOG' => true));
				$this->AddEditAction($arItem['ID'], $arSectionButtons['edit']['edit_section']['ACTION_URL'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'SECTION_EDIT'));
				$this->AddDeleteAction($arItem['ID'], $arSectionButtons['edit']['delete_section']['ACTION_URL'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'SECTION_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				// preview picture
				if($bShowSectionImage = in_array('PREVIEW_PICTURE', $arParams['FIELD_CODE'])){
					$bImage = strlen($arItem['~PICTURE']);
					$arSectionImage = ($bImage ? CFile::ResizeImageGet($arItem['~PICTURE'], array('width' => 429, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL, true) : array());
					$imageSectionSrc = ($bImage ? $arSectionImage['src'] : SITE_TEMPLATE_PATH.'/images/svg/noimage_content.svg');
				}
				?>
				<div class="col-md-12 col-sm-12">
					<div class="item_wrap colored_theme_hover_bg-block box-shadow rounded3 bordered-block " >
						<div class="item noborder <?=($bShowSectionImage ? '' : ' wti')?>  <?=$arParams['IMAGE_CATALOG_POSITION'];?> clearfix" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
							<?// icon or preview picture?>
							<?if($bShowSectionImage):?>
								<div class="image shine nopadding">
									<a href="<?=$arItem['SECTION_PAGE_URL']?>">
										<img src="<?=\Aspro\Functions\CAsproMax::showBlankImg($imageSectionSrc);?>" data-src="<?=$imageSectionSrc?>" alt="<?=( $arItem['PICTURE']['ALT'] ? $arItem['PICTURE']['ALT'] : $arItem['NAME']);?>" title="<?=( $arItem['PICTURE']['TITLE'] ? $arItem['PICTURE']['TITLE'] : $arItem['NAME']);?>" class="img-responsive lazy" />
									</a>
								</div>
							<?endif;?>

							<div class="body-info">
								<?// section name?>
								<?if(in_array('NAME', $arParams['FIELD_CODE'])):?>
									<div class="title font_mlg">
										<a href="<?=$arItem['SECTION_PAGE_URL']?>" class="dark-color">
											<?=$arItem['NAME']?>
										</a>
									</div>
								<?endif;?>

								<?// section preview text?>
								<?if(strlen($arItem['UF_TOP_SEO']) && $arParams['SHOW_SECTION_PREVIEW_DESCRIPTION'] != 'N'):?>
									<div class="previewtext  font_sm muted777 line-h-165">
										<?=$arItem['UF_TOP_SEO']?>
									</div>
								<?elseif(strlen($arItem['DESCRIPTION']) && $arParams['SHOW_SECTION_PREVIEW_DESCRIPTION'] != 'N'):?>
									<div class="previewtext  font_sm muted777 line-h-165">
										<?if($arParams['PREVIEW_TRUNCATE_LEN']):?>
											<?=CMax::truncateLengthText($arItem['DESCRIPTION'], $arParams['PREVIEW_TRUNCATE_LEN'])?>
										<?else:?>
											<?=$arItem['DESCRIPTION'];?>
										<?endif;?>
									</div>
								<?endif;?>
								<?// section child?>
								<?if($arItem['CHILD']):?>
									<div class="text childs">
										<ul>
											<?foreach($arItem['CHILD'] as $arSubItem):?>
												<?
												if(is_array($arSubItem['DETAIL_PAGE_URL'])){
													if(isset($arSubItem['CANONICAL_PAGE_URL']) && !empty($arSubItem['CANONICAL_PAGE_URL'])){
														$arSubItem['DETAIL_PAGE_URL'] = $arSubItem['CANONICAL_PAGE_URL'];
													}
													else{
														$arSubItem['DETAIL_PAGE_URL'] = $arSubItem['DETAIL_PAGE_URL'][key($arSubItem['DETAIL_PAGE_URL'])];
													}
												}
												?>
												<li class="font_sm"><a class="colored" href="<?=($arSubItem['SECTION_PAGE_URL'] ? $arSubItem['SECTION_PAGE_URL'] : $arSubItem['DETAIL_PAGE_URL'] );?>"><?=$arSubItem['NAME']?></a></li>
											<?endforeach;?>
										</ul>
									</div>
								<?endif;?>
								<?if($arItem['CHILD']):?>
									<div class="button_opener colored"><i class="fa fa-angle-down" aria-hidden="true"></i><?//=CMax::showIconSvg("arrow", SITE_TEMPLATE_PATH.'/images/svg/arrow_down_accordion.svg', '', '', true, false);?><span class="opener font_upper" data-open_text="<?=GetMessage('CLOSE_TEXT');?>" data-close_text="<?=GetMessage('OPEN_TEXT');?>"><?=GetMessage('OPEN_TEXT');?></span></div>
								<?endif;?>
								
												
								<a href="<?=$arItem['SECTION_PAGE_URL']?>" class="arrow_link colored_theme_hover_bg-el bordered-block rounded3 muted" title="<?=GetMessage('TO_ALL')?>"><?=CMax::showIconSvg("right-arrow", SITE_TEMPLATE_PATH.'/images/svg/arrow_right_list.svg', '', '');?></a>
								
							</div>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
	</div>
<?endif;?>