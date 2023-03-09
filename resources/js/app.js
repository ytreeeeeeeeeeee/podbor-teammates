function truncateText(selector, maxLength) {
    let elements = document.querySelectorAll(selector);

    elements.forEach((element, index) => {
        console.log(element.clientWidth);
        console.log(element.clientHeight);
        let truncated = element.innerText;
        if (truncated.length > maxLength) {
            truncated = truncated.substring(0, maxLength) + "...";
        }

        element.innerText = truncated;
    });
}

function footer() {
    const
        main = document.getElementsByTagName('main')[0],
        footer = document.getElementsByTagName('footer')[0]

    main.style.paddingBottom = footer.clientHeight + 'px'
}

window.addEventListener('load', footer);
window.addEventListener('resize', footer);
truncateText(".card-description", 90);
