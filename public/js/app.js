/*import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();*/

//Button view hiden password
$(document).ready(function () {
    $('#showPassword').on('mousedown', function () {
        $('#password').attr('type', 'text');
    }).on('mouseup mouseleave', function () {
        $('#password').attr('type', 'password');
    });
});

document.addEventListener("DOMContentLoaded", function(){
    const showCommentsButton = document.getElementById('show-comments');
    const commentsSection = document.getElementById('comments-section');

    if (showCommentsButton && commentsSection) {
        showCommentsButton.addEventListener('click', function(){
            commentsSection.style.display = commentsSection.style.display === 'none' ? '' : 'none';
        });
    }
});
