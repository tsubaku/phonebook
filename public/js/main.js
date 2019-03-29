/**
 * Search for a contact by partially entered number and/or contact name.
 * @param id
 */
function search(id) {
    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#searchForm').serialize(),

        success: function (result) {
            console.log('search ok');
            var data = JSON.parse(result);
            var numberList = data.numbers;

            //Amount contacts in contact list
            Object.size = function (obj) {
                var size = 0, key, key2;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
            };
            var size = Object.size(numberList);

            //Create and insert new contact list on page
            var newList = '';
            el = document.getElementById('contactListTbody');
            //for (var i = 0; i < size; i++) {
            for (key in numberList) {
                var name = numberList[key].name;
                var number = numberList[key].number;
                newList += '<tr>';
                newList += '<td>'+number+'</td>';
                newList += '<td>'+name+'</td>';
                newList += '</tr>';
            }
            el.innerHTML = newList;

        },

        error: function (result) {
            console.log('Error search(' + id + ') with text ' + serchText);
        }
    });

}
