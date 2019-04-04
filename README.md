##Задача


##Установка
Через композер.

##Реализовано
1. Две страницы: корневая предназначена для просмотра контактов и доступна всем, а **/admin/number** предназначена для редактирования списка и доступна только зарегистрированным пользователям.
2. AJAX поиск по контактам без перезагрузки страницы.
3. Счётчик контактов. Обновляется при поиске.
4. Валидация полей при добавлении и редактировании контактов. Поля:
- Номер: обязательное, цифровое, уникальное.
- Имя: обязательное, допустимы буквы, цифры, дефис и символ подчёркивания.


##FAQ
Q: Почему на странице просмотра контактов используется один поисковый скрипт, а на странице редактирования другой?

A: Для демонстрации разных возможностей: количесвто контактов, удовлетворяющих заданным условиям можно передавать во вью из контроллера, а можно вычислять уже в нём. Сам список контактов при этим можно формировать целиком, а можно манипулировать CSS свойствами строк и скрывать/показывать нужные.