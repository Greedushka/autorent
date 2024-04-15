/**
 *  Функция добавления товара в корзину
 *
 *  @param integer itemId ID продукта
 *  @return в случае успеха обновятся данные корзины на странице
 */
function addToCart(itemId){
    alert('В корзине')
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/add/" + itemId + '/',
        dataType: 'json',
        data: {
            id: itemId
        },
        success: function(data){
            console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

/**
 * Удаление продукта из корзины
 *
 * @param integer itemId ID продукта
 * @return в случае успеха обновятся данные корзины на странице
 */
function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/remove/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if(data['success']){

                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_'+ itemId).show();
                $('#removeCart_'+ itemId).hide();
            }
        }
    });
}

/**
 * Подсчет стоимости купленного товара
 *
 * @param integer itemId ID продукта
 *
 */
function conversionPrice(itemId){
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

/**
 * Получение данных с формы
 *
 */
function getData(obj_form){
    var hData = {};
    $('input, textarea, select',  obj_form).each(function(){
        if(this.name && this.name!=''){
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
};


/**
 * Сохранение заказа
 *
 */
function saveOrder(){
    var postData = getData('form');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/save/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                alert(data['message']);
                document.location = '/';
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Показывать или прятать данные о заказе
 *
 */
function showProducts(id){
    var objName = "#purchasesForOrderId_" + id;
    if( $(objName).css('display') != 'table-row' ) {
        $(objName).show();
    } else {
        $(objName).hide();
    }
}