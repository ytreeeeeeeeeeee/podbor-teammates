const editButton = document.querySelector('.edit-profile');
const modalWindow = document.querySelector('.modal');

editButton.addEventListener('click', () => {
    modalWindow.style.display = 'block';
});

modalWindow.addEventListener('click', (event) => {
    if (event.target === modalWindow) {
        modalWindow.style.display = 'none';
    }
});


