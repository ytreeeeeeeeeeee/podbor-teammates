const editButton = document.querySelector('.edit-button');
const modalWindow = document.querySelector('.modal');

if(editButton && modalWindow) {
    editButton.addEventListener('click', () => {
        modalWindow.style.display = 'flex';
    });

    modalWindow.addEventListener('click', (event) => {
        if (event.target === modalWindow) {
            modalWindow.style.display = 'none';
        }
    });
}
