/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import bootstrap from "./bootstrap";

import autosize from "autosize";

$.fn.autosize = function () {
    autosize(this.find('textarea'));
    autosize(this);
    return this;
};

autosize(document.getElementsByTagName('textarea'));

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

$.fn.removeContainerIfEmptyInput = function () {
    return this.each(function () {
        let $container = $(this);
        let $inputs = $container.find('input');
        $inputs.on('blur change', function () {
            let isEmpty = true;
            $inputs.each(function () {
                if($.trim(this.value)) {
                    return isEmpty = false;
                }
            });

            if(isEmpty) {
                $container.remove();
            }
        });
    });
};

$('.portfolio-edit-form')
    .on('keyup change', '.js-endless-list :input', function (e) {
        let $inputContainer = $(this).closest('.js-endless-list');
        if($.trim(this.value)) {
            $inputContainer.clone().insertAfter($inputContainer).find(':input').val('');

            let randomKey = '[new' + Math.ceil(Math.random() * 1E5) + ']';
            $inputContainer.removeContainerIfEmptyInput().removeClass('js-endless-list')
                .autosize()
                .find('input').each(function () {
                    this.setAttribute('name', this.getAttribute('name').replace('[new]',  randomKey));
                });

        }
    })
    .find('.js-remove-if-empty').removeContainerIfEmptyInput();

