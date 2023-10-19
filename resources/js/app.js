import './bootstrap';
import $ from "jquery";

$('div.col.my-auto.text-success.font-weight-bold').not('.success-message').delay(4000).fadeOut(350);
$('div.alert').not('.alert-important').delay(4000).fadeOut(350);

$(function () {
    'use strict'

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    })

})
