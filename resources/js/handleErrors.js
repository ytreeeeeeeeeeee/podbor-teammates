const inputs = document.querySelectorAll('[data-error]');
const errorTable = document.querySelector('template');

inputs.forEach((input) => {
    const error = JSON.parse(input.dataset.error);

    if (error) {
        input.classList.add('form-item--invalid');

        input.addEventListener('mouseenter', () => {
            const clone = errorTable.content.cloneNode(true);
            const errorText = clone.querySelector('#error-text')
            errorText.textContent = error;
            input.parentElement.appendChild(clone);

        });

        input.addEventListener('mouseout', () => {
            const error = input.querySelector('#template-error')
            error.remove();
        });

        input.addEventListener('change', () => {
            input.classList.remove('form-item--invalid');
        });
    }
});
