<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Условия оплаты");
?><p>
	 Мы сотрудничаем как с физическими, так и с юридическими лицами.&nbsp;Приобретая товары в нашем магазине, вы можете использовать любой способ оплаты:&nbsp;наличный или безналичный расчёт, оплату с помощью банковской карты.
</p>
<h4>Наличный расчёт</h4>
<p>
	 Оплату наличными можно произвести при доставке товаров нашими экспедиторами (только по г.Москва) и&nbsp;при покупке в нашем офисе.&nbsp;
</p>
<h4>Безналичный перевод</h4>
<p>
	 После оформления заказа вы получите счет, который можно оплатить в любом банке, или&nbsp;с помощью банковской карты в режиме онлайн.
</p>
<h4>Оплата банковской картой</h4>
<p>
	 Вы всегда можете оплатить купленный у нас товар с помощью банковской карты. Это&nbsp;можно сделать:
</p>
<p>
</p>
<ul>
	<li>на сайте в режиме онлайн с помощью системы ROBOKASSA;</li>
	<li>при доставке товара, используя имеющийся у наших экспедиторов мобильный&nbsp;терминал (только по г.Москва);</li>
	<li>при покупке в нашем офисе, если вы предпочли забрать товар самовывозом. Если&nbsp;вы производите оплату картой лично, то сумма покупки не ограничена.</li>
</ul>
<div class="pays">
								<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy/pay_system_icons.php", Array(), Array(
										"MODE" => "php",
										"NAME" => "onfidentiality",
										"TEMPLATE" => "include_area.php",
									)
								);?>
							</div>
							<style>
.pays i.cacsh {
    width: 30px;
    height: 30px;
    background-position: 4px 0px;
}
.pays i.mastercard {
    width: 46px;
    height: 30px;
    background-position: -351px 0px;
}
.pays i.visa {
    width: 52px;
    height: 30px;
    background-position: -57px 0px;
}
.pays i.yandex_money {
    width: 21px;
    height: 30px;
    background-position: -138px 0px;
}
.pays i.webmoney {
    width: 25px;
    height: 28px;
    background-position: -189px 0px;
}
.pays i.qiwi {
    width: 27px;
    height: 29px;
    background-position: -244px 0px;
}
.pays i.sbrf {
    width: 26px;
    height: 29px;
    background-position: -567px 0px;
}
.pays i.alfa {
    width: 22px;
    height: 29px;
    background-position: -624px 0px;
}
 .pays i {
    display: inline-block;
    vertical-align: middle;
    margin: 0px 10px;
    background: url(/local/templates/aspro_max/css/../images/svg/payment.svg) 0px 0px no-repeat;
}
							</style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>