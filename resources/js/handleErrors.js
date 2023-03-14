const inputs = document.querySelectorAll('[data-error]');
const errorTable = document.querySelector('template');

const addError = (e, error) => {
    const clone = errorTable.content.cloneNode(true);
    const errorText = clone.querySelector('#error-text');
    errorText.textContent = error;
    e.target.parentElement.appendChild(clone);
}

const deleteErrorTable = (e) => {
    const error = e.target.parentElement.querySelector('#template-error');
    error.remove();
}

inputs.forEach((input) => {
    const error = JSON.parse(input.dataset.error);

    if (error) {
        input.classList.add('form-item--invalid');

        const addErrorTable = (e) => {
            addError(e, error)
        }

        input.addEventListener('mouseenter', addErrorTable);

        input.addEventListener('mouseout', deleteErrorTable);

        input.addEventListener('change', () => {
            input.classList.remove('form-item--invalid');
        });

        input.addEventListener('input', (e) => {
            deleteErrorTable(e);
            input.classList.remove('form-item--invalid');
            input.removeEventListener('mouseenter', addErrorTable);
            input.removeEventListener('mouseout', deleteErrorTable);
        }, {once: true});
    }
});
