<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$resultPrice = 0;
?>

<div class="move_calc">
    <form action="<?=$APPLICATION->GetCurPageParam() ?>" name="calc_form" method="POST" class="move_calc__form">
        <input type="hidden" name="CURRENT_PAGE" value="<?= $arParams['STEP']?>">

        <div class="move_step move_step-active move_step3s">
            <div class="move_step3__list">
                <div class="move_step3__item move_step3__item-transport move_config">
                    <div class="move_config__head">
                        <div class="move_config__left">
                            <p class="move_config__spoiler_title move_config__spoiler_title-custom">Упаковка:</p>
                        </div>
                        <div class="move_config__right">
                            <a href="<?= $arParams['SEF_FOLDER'] . 'packaging/'?>" class="btn btn-white" type="button">Вернуть рекомендуемые значения</a>
                        </div>
                    </div>
                    <div class="move_config__content">
                        <div class="custom_content">
                            <div class="packaging">
                                <div class="packaging__list">
                                    <div class="packaging__item packaging__item-head">
                                        <div class="packaging__tt packaging__n">
                                            <p class="packaging__titles">Наименование:</p>
                                        </div>
                                        <div class="packaging__tt packaging__c">
                                            <p class="packaging__titles packaging__titles-center">Кол-во:</p>
                                        </div>
                                        <div class="packaging__tt packaging__o">
                                            <p class="packaging__titles packaging__titles-center">Цена за 1 ед.:</p>
                                        </div>
                                        <div class="packaging__tt packaging__p">
                                            <p class="packaging__titles packaging__titles-center">Сумма:</p>
                                        </div>
                                        <div class="packaging__tt packaging__d">&nbsp;</div>
                                    </div>

                                    <?
                                    $_selectField = 'class="check_address_rigging__select form__select" style="width: 100%;"';
                                    foreach ($arResult['ITEMS'] as $item) { ?>
                                        <div class="packaging__item packaging__item-line">
                                            <div class="packaging__tt packaging__n">
                                                <div class="packaging__goods_info">
                                                    <? if($item['PICTURE']) {?>
                                                        <div class="packaging__pic"><img
                                                                    src="<?= FRONEND_BUILD_PATH ?>img/pic.jpg" alt=""
                                                                    class="packaging__img"></div>
                                                    <? } ?>
                                                    <p class="packaging__name"><?= $item['NAME']?></p>
                                                </div>

                                                <?= SelectBoxFromArray(
                                                    "check_address",
                                                    $arResult['select_route'],
                                                    $_REQUEST["check_address"],
                                                    '',
                                                    $_selectField);?>
                                            </div>
                                            <div class="packaging__tt packaging__c">
                                                <p class="packaging__hidden_title">Кол-во:</p>
                                                <div class="numGoods">
                                                    <span class="numGoods__btn numGoods__minus">-</span>
                                                    <input type="text" value="<?= $item['NUM']?>" name="ORDER_PROP_20" class="numGoods__input">
                                                    <span class="numGoods__btn numGoods__plus">+</span>
                                                </div>
                                            </div>
                                            <div class="packaging__tt packaging__o">
                                                <p class="packaging__hidden_title">Цена за 1 ед.:</p>
                                                <p class="packaging__price_one"><?= SaleFormatCurrencyDev($item['PRICE'])?> ₽</p>
                                            </div>
                                            <div class="packaging__tt packaging__p">
                                                <p class="packaging__hidden_title">Сумма:</p>
                                                <p class="packaging__price"><?= SaleFormatCurrencyDev($item['RESULT_PRICE'])?> ₽</p>
                                            </div>
                                            <div class="packaging__tt packaging__d">
                                                <button class="custom_title_box__delete" type="button" onclick="deleteNode('.packaging__item');">Удалить</button>
                                            </div>
                                        </div>
                                    <?
                                        $resultPrice += $item['RESULT_PRICE'];
                                    } ?>

                                    <div class="packaging__item">
                                        <p class="packaging__total">Итого: <span><?= SaleFormatCurrencyDev($resultPrice)?> ₽</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stevedores">
                            <button class="stevedores_btn btn">+ Добавить упаковку и другие товары для переезда</button>
                        </div>
                    </div>
                </div>
                <div class="move_step__buttons move_step1__buttons">
                    <a class="move_step__btn btn btn-white" href="<?= $arResult['prev_step'] ?>">Предыдущий шаг</a>
                    <button class="move_step__btn btn btn-white" type="button">Удалить упаковку из заказа</button>
                    <input class="move_step__btn btn" type="submit" value="Далее" name="submit_next">
                </div>
            </div>
        </div>
    </form>
</div>
