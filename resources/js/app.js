import './bootstrap';

$("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
$("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'});


var hiddenElement = document.getElementById("but");
var btn = document.querySelector('.header-button');
var btn2 = document.querySelector('.footer-button');

function handleButtonClick() {
    hiddenElement.scrollIntoView({block: "center", behavior: "smooth"});
}

btn.addEventListener('click', handleButtonClick);
btn2.addEventListener('click', handleButtonClick);


jQuery(function ($) {
    $.datepicker.regional['ua'] = {
        closeText: 'Закрити',
        prevText: '&#x3c;Поп',
        nextText: 'Наст&#x3e;',
        currentText: 'Сьогодні',
        monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень',
            'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        monthNamesShort: ['Січ', 'Лют', 'Бер', 'Квіт', 'Трав', 'Черв',
            'Лип', 'Серп', 'Вер', 'Жовт', 'Лист', 'Груд'],
        dayNames: ['неділя', 'понеділок', 'вівторок', 'среда', 'четвер', 'п\'ятница', 'субота'],
        dayNamesShort: ['нд', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'],
        dayNamesMin: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Ти',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ua']);
});
