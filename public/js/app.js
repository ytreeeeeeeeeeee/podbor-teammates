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

truncateText(".card-description", 75);
