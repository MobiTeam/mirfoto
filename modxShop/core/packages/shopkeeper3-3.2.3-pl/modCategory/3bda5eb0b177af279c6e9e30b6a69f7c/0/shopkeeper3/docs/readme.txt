
============================================

Shopkeeper 3.x

http://modx-shopkeeper.ru/

============================================

English version - core/components/shopkeeper3/docs/readme_en.txt.

--------------------------------------------

Сниппет Shopkeeper

Параметры:

lang - язык. По умолчанию - ru.
prodCont - CSS-селектор элемента, внутри которого находится информация о товаре (по умолчанию `div.shk-item`);
cartTpl - Чанк корзины (в нём содержатся две части: пстая корзина и корзина с товарами). По умолчанию - shopCart.
cartRowTpl - Чанк строки товара в корзине. По умолчанию - shopCartRow.
packageName - Имя пакета таблицы БД товаровe: "shop". По умолчанию пусто (modResource).
className - Имя класса таблицы БД товаров. Пример: "ShopContent". По умолчанию пусто (modResource).
fieldPrice - Имя поля или TV с ценой товара. По умолчанию - price.
fieldName - Имя поля или TV с названием товара. По умолчанию - pagetitle.
getUnpublished - Разрешить добавлять в корзину неопубликованные товары. По умолчанию - false.
allowFloatCount - Разрешить числа с плавающей точкой для кол-ва товара. По умолчанию - false.
excepDigitGroup - Делать разрядность больших чисев в ценах.
orderFormPageId - ID страницы оформления заказа.
currency - Валюта. По умолчанию - руб.
processParams - Просчитывать дополнительные параметры перед добавлением товара в корзину.
savePurchasesFields - Список полей (или имен TV) товаров, которые нужно выводить в корзине и сохранять при заказе (через запятую).
orderDataRowTpl - чанк строки товара в списке в письме, которое отправляется при заказе ([[+orderOutputData]]). По умолчанию orderDataRow.
flyToCart - Эффект добавления товара в корзину - helper | image | nofly (по умолчанию `helper`);
noJavaScript - Работать без JavaScript (по умолчанию `0`);
noJQuery - Не подгружать jquery.js (по умолчанию `0`);
style - Стиль корзины (по умолчанию `default`);
pluralWords - Слова через запятую, которые нужно склонять по количеству. По умолчанию слова берутся из языкового файла (товар,товара,товаров).
groupBy - Название поля, по которому нужно группировать товары в корзине. Пример: &groupBy=`parent`

Пример использования:

[[!Shopkeeper3@cart_catalog]]

cart_catalog - Имя набора параметров.
Рекомендуется все параметры указывать в наборе параметров, т.к. нужно синхронизировать эти параметры при аякс-запросе.

Можно выводить две и более корзины на одной странице.

Пример чанка корзины товаров:

<div class="shop-cart" data-shopcart="1">
    <div class="shop-cart-head"><b>Корзина</b></div>
    <div class="empty">
        <div class="shop-cart-empty">Пусто</div>
    </div>
</div>
<!--tpl_separator-->
<div class="shop-cart" data-shopcart="1">
    <div class="shop-cart-head"><b>Корзина</b></div>
    <div class="full">
        <div  style="text-align:right;">
            <a href="[[+empty_url]]" id="shk_butEmptyCart">Очистить корзину</a>
        </div>
        <div class="shop-cart-body">Выбрано: <b>[[+items_total]]</b> [[+plural]]</div>
        <div style="text-align:right;">Общая сумма: <b>[[+price_total]]</b> [[+currency]]
        </div>
        <div class="cart-order">
            <a href="[[+order_page_url]]" id="shk_butOrder">Оформить заказ</a>
        </div>
    </div>
</div>

Чанк состоит из двух частей, разделенных специальным разделителем <!--tpl_separator-->

Первая часть - чанк пустой корзины товаров.
Вторая часть - чанк корзины с товарами.

data-shopcart="1" - это метка, по которой определяется набор параметров при аякс-обновлении корзины.
В настройках системы (Настройки системы -> shopkeeper3) в параметре "shk3.property_sets" нужно указать имена наборов параметров (можно несколько через запятую),
которые используются на вашем сайте для сниппета Shopkeeper. Это нужно для синхронизации при аякс-обновлении корзины.
Например shk3.property_sets = cart_catalog,cart_order_page
В этом случае в чанке (cartTpl), который указан в  наборе параметров "cart_catalog" нужно поставить метку data-shopcart="1".
А в чанке , который указан в наборе параметров "cart_order_page" поставить метку data-shopcart="2" (порядковый номер набора параметров).

--------------------------------------------

Параметры в настройках системы

В админке перейти "Настройки системы" -> "shopkeeper3" (фильтр).

shk3.property_sets - Список используемых наборов параметров сниппета Shopkeeper3. Подробнее в разделе "Пример чанка корзины товаров". По умолчанию "cart_catalog,cart_order_page".
shk3.currency - Название основной валюты сайта. По умолчанию "руб.".
shk3.currency_default - Номер валюты в списке по умолчанию. Подробнее в разделе "Мультивалютность". По умолчанию "1".
shk3.mail_order_data_tpl - Чанк шаблона данных заказа (для письма заказа). По умолчанию "orderDataOuter".
shk3.mail_order_data_row_tpl - Чанк шаблона одного товара в письме заказа. По умолчанию "orderDataRow".
shk3.mail_contacts_row_tpl - Чанк шаблона строки контактных данных в письме заказа. По умолчанию "mailContactsRow".
shk3.first_status - Номер первого статуса заказа от еденицы. Этот статус присваивается при создании заказа. По умолчанию "1" (Новый).

--------------------------------------------

Плейсхолдеры, доступные в чанке "cartTpl":

[[+inner]] - список товаров (по шаблону cartRowTpl);
[[+price_total]] - общая цена товаров в корзине;
[[+items_total]] - общее число товаров в корзине;
[[+items_unique_total]] - общее число уникальных товаров в корзине;
[[+plural]] - слово "товар" во множественном числе в зависимости от числа выбранных товаров;
[[+this_page_url]] - адрес текущей страницы;
[[+empty_url]] - ссылка для очистки корзины;
[[+order_page_url]] - ссылка на страницу оформления заказа;
[[+currency]] - валюта товаров;
[[+delivery_name]] - Название выбранной доставки.
[[+delivery_price]] - Цена выбранной доставки.

Плейсхолдеры, доступные в чанке "cartRowTpl":

[[+name]] - название товара;
[[+id]] - ID товара;
[[+url]] - ссылка на страницу товара;
[[+price]] - цена товара;
[[+price_total]] - общая цена товара, включая доп. параметры;
[[+price_count]] - цена товара, умнженная на кол-во;
[[+price_count_total]] - общая цена товара с параметрами, умноженная на кол-во;
[[+currency]] - валюта товара;
[[+count]] - количество товара;
[[+index]] - порядковый номер товара в корзине от нуля;
[[+num]] - порядковый номер товара в корзине от единицы;
[[+even]] - четный или нечетный товар (выводит 1 или 0);
[[+comma]] - запятая (выводится между товарами);
[[+url_del_item]] - ссылка на удаление товара из корзины;
[[+addit_data]] - дополнительные параметры товара; 
[[+любой TV]] - любой TV-параметр, например [[+image]];
[[+shk_любой TV]] - любой доп. параметр, выбранный при добавлении товара в корзину (из [[+addit_data]]), например [[+shk_param1]].
    Если параметры сделаны в виде чекбоксов, то чтобы вывести отдельно каждый из них, нужно добавлять индекс (номер от нуля) для параметров следующих за первым. Пример: [[+shk_param1]], [[+shk_param1_1]], [[+shk_param1_2]] ...

--------------------------------------

События для плагинов:

OnSHKaddProduct - Добавление товара в корзину. $purchaseArray
OnSHKAfterAddProduct - После добавления товара в корзину. $purchaseArray, $index, $id
OnSHKgetProductPrice - Выбор цены товара при добавлении в корзину. $price, $id, $purchaseArray
OnSHKgetDeliveryPrice - Выбор цены досавки. $price
OnSHKgetProductAdditParamPrice - Выбор цены доп. параметра товара при добавлении в корзину. $price, $id
OnSHKcalcTotalPrice - Рассчет полной цены товаров в корзине. $price_total, $purchases
OnSHKbeforeCartLoad - Вызывается до начала формирования HTML-кода корзины.
OnSHKcartLoad - Вывод корзины. $items_total, $price_total
OnSHKChangeStatus - Изменение статуса заказа. Доступны: $order_ids, $status.
OnSHKsaveOrder - Отправка заказа. $order_id
OnSHKAfterRemoveProduct - После удаления товара из корзины. $index, $id
OnSHKAfterClearCart - После очистки корзины (удаления всех товаров).

============================================

Виджет

Для добавления виджета "Статистика заказов" на панель перейти
"Панели" -> "Панели" -> "Default" -> "Редактировать" -> "Добавить виджет" -> "Статистика заказов".
Перетащить в списке виджет вверх.

============================================

Плагин "shk_updateInventory" - Учет товара на складе

Плагин меняет число (значение поля или TV) кол-ва товара на складе, при переводе заказа в нужный статус.
По умолчанию плагин отключен, нужно его включить и настроить параметры:

inventory_fieldname - Имя поля или TV, где записано число товара на складе. По умолчанию - inventory.
plugin_status - номер статуса (от 1) при котором нужно уменьшать число товаров на складе. По умолчанию - 2.
context - имя контекста, кэш которого нужно очистить после пересчета товара на складе.

============================================

Автоматические псевдонимы для MIGXDB

Создать плагин на событие "OnDocFormSave" с кодом из файла:
"/core/components/shopkeeper3/elements/plugins/migx_autoalias.php"

Открыть файл "/core/components/migx/processors/mgr/default/update.php" и сразу после "$object->save()"
точнее в актуальной версии версии это после

if ($object->save() == false) {
    $updateerror = true;
    $errormsg = $modx->lexicon('quip.thread_err_save');
    return;
}

Добавить вызов плагина так:

$modx->invokeEvent( 'OnDocFormSave', array( 'id' => $object->get('id'), 'resource' => &$object ) );

============================================

Сниппет shkOptions

Сниппет для вывода конфигурации Shopkeeper. Например можно выводить список способов доставки и оплаты.

Параметры:

get - Названия параметров, которые нужно достать из БД. Можно несколько через запятую.
post_name  - Названия полей в форме. Например вывод при оформлении заказа. Нужно для работы плейсхолдера [[+selected]] - выбранное значение.
tpl - Названия чанка для одной строки параметра.
toPlaceholders - отправить вывод в плейсхолдеры (разделенные по названию параметров). По умолчанию 0 (выкл.).
pl_prefix - Префикс названия плейсхолдера. По умолчанию: shkopt_.

Пример чанка (tpl):
<option value="[[+value]]" [[+selected]]>[[+label]]</option>

Пример использования:

[[!shkOptions?
&get=`delivery,payments`
&post_name=`shk_delivery,payment`
&toPlaceholders=`1`
&pl_prefix=`shkopt_`
&tpl=`select_option`
]]

Способ доставки: 
<select name="shk_delivery">
    <option value=""></option>
    [[!+shkopt_delivery]]
</select>

Способ оплаты:
<select name="payment">
    <option value=""></option>
    [[!+shkopt_payments]]
</select>

Для динамического обновления цены доставки в корзине можно использовать такой скрипт:

<script type="text/javascript">
$(document).bind('ready',function(){
    if ( SHK.data.delivery_name ) {
        $('select[name="shk_delivery"]','#shopOrderForm').val( SHK.data.delivery_name );
    }
    $('select[name="shk_delivery"]','#shopOrderForm').bind('change',function(){
        SHK.selectDelivery( $(this).val() );
    });
});
</script>

============================================

Мультивалютность

Для мультивалютности используется плагин "shk_multicurrency". Проверьте чтобы он был активирован (по умолчанию выключен).

В настройках системы используются параметры:
shk3.currency - название валюты по умолчанию.
shk3.currency_default - номер валюты в списке по умолчанию.

Курсы вылют задаются в конфигурации компонента Shopkeeper3. "Управление заказами" -> "Настройки" -> "Курсы валют". 

Если все цены интернет-магазина заданы в долларах (USD), в параметре "shk3.currency_default" нужно указать значение "3" (без кавычек),
если в списке валют USD под номером 3.

В шаблоне в нужном месте разместить выпадающий список с выбором валют:

<select id="site_currency" name="curency">
    <option value="1">руб.</option>
    <option value="2">грн.</option>
    <option value="3">USD</option>
    <option value="4">euro</option>
</select>

Также список валют можно выводить с помощью сниппета "shkOptions".

При выборе валюты все цены будут пересчитаны по соответствующему курсу.

Для пересчета цены в шаблоне страницы товара использовать модификатор "shk_curr_rate":

[[!*price:shk_curr_rate]] [[!+shk_currency]]

shk_currency - плейсхолдер наименования валюты.

Пример вывода цены в чанке сниппета getProducts при выводе списка товаров:

[[+tv.price:shk_curr_rate]] [[+shk_currency]]

-------------------------------

Если на сайте только одна валюта, но цены товаров указаны в другой валюте,
нужно добавить в настройках системы параметр "shk3.currency_selected" (Пространство имен "shopkeeper3") со значением - номер валюты (от еденицы),
в которую нужно переводить.
Например, если у товаров указана цена в долларах, а нужно выводить в рублях:
shk3.currency_default = 3 (USD)
shk3.currency_selected = 1 (руб.)
3 - номер валюты USD в списке курсов валют.

============================================

Дополнительные параметры товаров:

Товарам можно назначать параметры, которые покупатель сможет выбрать перед добавлением товара в корзину.
Параметры выводятся в виде выпадающего списка - shk_select, радио кнопок - shk_radio или флажков (чекбоксов) - shk_checkbox.
Выбрать тип вывода можно в настройках TV-параметра на вкладке "Параметры вывода".

Значения параметров (на странице редактирования ресурса (товара)) вводятся по такому принципу:
название параметра 1==цена 1||название параметра 2==цена 2||...

Можно ввести цену параметра со знаком умножения: Вес==*0.5||Вес==*1
В этом случае цена товара будет умножена на цену параметра.

В чанке сниппета getResources или getProducts параметры выводятся как плейсхолдеры: [[+tv.param1]].

На странице товара (в шаблоне товара) нужно изменить ID параметра. Сделать это можно с помощью фильтра replace:
[[*param1:replace=`[[+id]]==[[*id]]`]]

Контроллер параметров вывода: core/model/modx/processors/element/tv/renders/mgr/properties/
Параметры вывода: manager/templates/default/element/tv/renders/properties/
Контроллеры вывода: core/model/modx/processors/element/tv/renders/web/output/

============================================

Две и более цены для одного товара

Для этого нужно создать две или более формы (<form>) и в поле name=«shk-id» после ID написать имя TV с ценой.

Пример:

<input type="hidden" name="shk-id" value="[[*id]]__price2" />

При submit формы в корзину добавится цена из TV-параметра (или поля) с именем «price2».

============================================

Добавление в корзину данных без создания TV-параметров

Пример:

<input type="text" name="test__[[*id]]__add" value="дополнительные данные" />

В корзину добавится параметр, который можно выводить в месте вставки плейсхолдера [[+shk_test]] (выведется «дополнительные данные»). 

============================================

Сниппет "shk_sitemap" - создание sitemap.xml

Автор - slaad

1. Создать документ с именем и псевдонимом "sitemap".

2. Установить пустой шаблон и отметить флажки "Публиковать" и "Не показывать в меню".
   Тип содержимого - XML.

3. В поле "Содержимое ресурса" вставить вызов сниппета.

Параметры сниппета:

packageNames - Имя пакета объектов которые нужно вывдить (можно несколько через запятую).
classNames - Имя класса объектов которые нужно вывдить (можно несколько через запятую).
contexts - Контекст, в котором находятся объекты (можно несколько через запятую). Внимаение! Нужно сохранять порядок контекстов и классов, если их несколько, см. пример ниже.

Примеры:

1. Только ресурсы (Один или больше контекстов):

[[shk_sitemap?
&packageNames=`modResource`
&classNames=`modResource`
]]

2. Ресурсы и товары из отдельной таблицы, два контекста:

[[shk_sitemap?
&packageNames=`modResource,shop`
&classNames=`modResource,ShopContent`
&contexts=`web,catalog`
]]

В данном случае родители товаров (категории каталога) находятся в контексте "catalog".

============================================

Пример чанка товара при выводе списка товаров:

<div class="product shk-item">
    <div class="product-b">
        <div class="product-descr">
            <a href="[[~[[+id]]? &scheme=`abs`]]">
                <img class="shk-image" src="[[+tv.image]]" alt="" height="130" width="130" />
            </a>
            <h3>[[+pagetitle]]</h3>
            [[+introtext]]<br />
            <a href="[[~[[+id]]? &scheme=`abs`]]">Details &rsaquo;</a>
            <div style="clear:both;"></div>
        </div>
        <form action="[[~[[*id]]? &scheme=`abs`]]" method="post">
            <fieldset>
                <input type="hidden" name="shk-id" value="[[+id]]" />
                <input type="hidden" name="shk-count" value="1" />
                <div class="product-price">
                    <button type="submit" class="shk-but">Add to cart</button>
                    <div>Price: <span class="shk-price">[[+tv.price:num_format]]</span> руб.</div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

============================================

Вывод списка товаров с помощью сниппетов "getPage" и "getProducts":

[[!getPage?
&elementClass=`modSnippet`
&element=`getProducts`
&className=`shopContent`
&packageName=`shop`
&limit=`10`
&tpl=`product`
&where=`{"template":15}`
]]
<br clear="all" />
<ul class="pages">
[[!+page.nav]]
</ul>

============================================

Оформление заказа с помощью сниппета "FormIt" и хука "shk_fihook"

[[!FormIt?
&hooks=`spam,shk_fihook,email,FormItAutoResponder,redirect`
&submitVar=`order`
&emailTpl=`shopOrderReport`
&fiarTpl=`shopOrderReport`
&emailSubject=`В интернет-магазине "[[++site_name]]" сделан новый заказ`
&fiarSubject=`Вы сделали заказ в интернет-магазине "[[++site_name]]"`
&emailTo=`[[++emailsender]]`
&fiarReplyTo=`[[++emailsender]]`
&fiarToField=`email`
&redirectTo=`10`
&validate=`address:required,fullname:required,email:email:required,phone:required`
&errTpl=`<br /><span class="error">[[+error]]</span>`
]]

[[$shopOrderForm]]

В чанке shopOrderReport доступны плейсхолдеры:

orderID - ID заказа.
orderDate - Дата заказа.
orderPrice - Цена заказа.
orderOutputData - Состав заказа (чанк "orderDataOuter"). Включает список товаров, контактные данные, доставку.
orderCurrency - Валюта заказа.


