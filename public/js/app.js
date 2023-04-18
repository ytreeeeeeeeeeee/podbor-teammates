function statusColor(selector) {
    const status = document.querySelector(selector);
    if (status) {
        let color = '';
        switch (status.dataset.status) {
            case '1':
                color = "yellow";
                break;
            case '2':
                color = "green";
                break;
            case '3':
                color = "red";
                break;
            default:
                break;
        }
        status.style.backgroundColor = color;
    }
}

function truncateText(selector, maxLength) {
    let elements = document.querySelectorAll(selector);

    elements.forEach((element, index) => {
        let truncated = element.innerText;
        if (truncated.length > maxLength) {
            truncated = truncated.substring(0, maxLength) + "...";
        }

        element.innerText = truncated;
    });
}

truncateText(".card-description", 90);
statusColor('.user-status');
