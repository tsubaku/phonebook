/**
 * Search for a contact by partially entered number and/or contact name. It is used on the contacts view page.
 *
 * Assumed that only the list of contacts will be received from the controller, without their number. The function updates the count of found contacts and forms a table of contacts, which it inserts into the page.
 * @param id
 */
function search(id) {
    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#searchForm').serialize(),

        success: function (result) {
            //console.log('search ok');
            var data = JSON.parse(result);
            var numberList = data.numbers;

            //Amount contacts in contact list
            Object.amountNumbers = function (obj) {
                var amountNumbers = 0, key, key2;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) amountNumbers++;
                }
                return amountNumbers;
            };
            var amountNumbers = Object.amountNumbers(numberList);

            document.getElementById('amountNumbers').textContent = amountNumbers;

            //Create and insert new contact list on page
            var newList = '';
            el = document.getElementById('contactListTbody');
            for (key in numberList) {
                var name = numberList[key].name;
                var number = numberList[key].number;
                newList += '<tr>';
                newList += '<td>' + number + '</td>';
                newList += '<td>' + name + '</td>';
                newList += '</tr>';
            }
            el.innerHTML = newList;
        },

        error: function (result) {
            console.log('Error search(' + id + ') with text ' + serchText);
        }
    });

}

/**
 * Search for a contact by partially entered number and/or contact name. It is used on the contacts edit page.
 *
 * Assumed that a list of contacts and their number will be received from the controller. The function updates counter contacts and displays contacts that satisfy the search condition by manipulating the css with the properties of the contact list.
 * @param id
 */
function search2(id) {
    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#searchForm').serialize(),

        success: function (result) {
            //console.log('search ok');
            var data = JSON.parse(result);
            var numberList = data.numbers;          //Contacts in contact list
            var amountNumbers = data.amount_numbers;  //Amount contacts in contact list

            document.getElementById('amountNumbers').textContent = amountNumbers;

            //Create and insert new contact list on page
            var tdNumbers = document.getElementsByClassName('tdNumber');
            for (var i = 0; i < tdNumbers.length; i++) {
                var tdNumber = tdNumbers[i].innerText;          //Number in DOM
                flag = false;
                for (j = 0; j < amountNumbers; j++) {
                    var numberInList = numberList[j]['number']; //the Number from the search list
                    if (numberInList == tdNumber) {
                        flag = true;                            //true = included in the search list
                    }
                }
                if (flag == true) {
                    $(tdNumbers[i].parentElement).show();
                } else {
                    $(tdNumbers[i].parentElement).hide();
                }
            }
        },

        error: function (result) {
            console.log('Error search2(' + id + ') with text ' + serchText);
        }
    });

}

