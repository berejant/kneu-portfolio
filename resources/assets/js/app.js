/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import bootstrap from "./bootstrap";

let $logoutForm = $('#logout-form'),
    isGuest = !$logoutForm.length;

if(isGuest) {
    // кнопки, які працюють лише авторизованних користувачів
    $('.require-authentication').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        location.assign('/login');
    });

} else {
    $('.logout-button').on('click', function(event) {
        event.preventDefault();
        $logoutForm.submit();
    });
}

