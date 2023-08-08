import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Button view hiden password
$(document).ready(function () {
    $('#showPassword').on('mousedown', function () {
        $('#password').attr('type', 'text');
    }).on('mouseup mouseleave', function () {
        $('#password').attr('type', 'password');
    });
});

