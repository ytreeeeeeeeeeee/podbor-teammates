const editButton = document.querySelector('.edit-profile');
const modalWindow = document.querySelector('.modal');

if(editButton && modalWindow) {
    editButton.addEventListener('click', () => {
        modalWindow.style.display = 'block';
    });

    modalWindow.addEventListener('click', (event) => {
        if (event.target === modalWindow) {
            modalWindow.style.display = 'none';
        }
    });
}
