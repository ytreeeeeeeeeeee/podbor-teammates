/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

// import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import './components/chatIndex';

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

function footer() {
    const
        main = document.getElementsByTagName('main')[0],
        footer = document.getElementsByTagName('footer')[0]

    main.style.paddingBottom = footer.clientHeight + 'px'
}

window.addEventListener('load', footer);
window.addEventListener('resize', footer);
truncateText(".card-description", 90);
