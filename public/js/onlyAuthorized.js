const panel = document.querySelector('.profile-info');
const avatar = document.querySelector('.profile-container');
avatar.addEventListener('mouseenter', function (event) {
    panel.style.display = 'flex';
});

avatar.addEventListener('click', function (event) {
    panel.style.display = 'flex';
});

avatar.addEventListener('mouseleave', function() {
    $(panel).fadeOut(2500);
});
