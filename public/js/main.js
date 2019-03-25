/**
 * Обработка кнопки Next в CartController/validation()
 * @param id
 */
function search(id) {
    console.log(id);
    var name = document.getElementById('contactName');
    var number = document.getElementById('contactNumber');

    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#formCart').serialize(),
        success: function (result) {
            console.log('ok');
            var data = JSON.parse(result);
            //console.log('success nextForm2');

            //Проверка, признал ли контроллер данные валидными
            if (data.valid == '+') {
                //$(".divFormOrder").hide();
                //$(id).show();
                //Подсветить следующий пункт в навигационной строке корзины
                //document.getElementById('nav-item3').className += " active";
                console.log(data);
            } else {
                console.log(data);
            }
        },
        error: function (result) {
            console.log('error nextForm2');
        }
    });

}


