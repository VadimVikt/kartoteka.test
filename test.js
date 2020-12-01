/**
 * Задание № 1
 * Напишите скрипт, который будет вытаскивать первое предложение последней (по дате) новости на www.kartoteka.ru
 * Не очень получилось, но все же
 */

// 1. Зайти на сайт и выолнить строку
window.location.href = '/korporativnyye';

// 2. После перехода на страницу новостей выполнить скрипт
let a = $('.new_block').text();
let str = a.split('\n')[1];
console.log(str);


/**
 * Задание 2
 * Напишите код, который исполнив в консоли, получим в подвале www.kartoteka.ru (рядом с телефоном) текущее время (обновляемое по секундам)
 */

$('.phone_ks h2').append('<span class="cotli"></span>')
function clock() {

    let d = new Date();
    let hrs = d.getHours();
    let min = d.getMinutes();
    let sec = d.getSeconds();

    if (hrs <= 9) hrs="0" + hrs;
    if (min <=9 ) min="0" + min;
    if (sec <= 9) sec="0" + sec;

    $(".cotli").html(" " + hrs + ":" + min + ":" + sec );
}
setInterval("clock()",1000);