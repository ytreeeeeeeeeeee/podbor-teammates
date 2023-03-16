let current_value = 9;
let max_scroll = true;
const reqsList = document.querySelector('.card-request--list');

$(window).scroll(setTimeout(function() {
    if(max_scroll && $(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
        let pageInfo = reqsList.dataset.page;
        $.ajax({
            url: '/req-scroll',
            method: 'GET',
            data: {start: current_value, page: pageInfo},
            success: function (text) {
                console.log(text);
                if (!text) {
                    max_scroll = false;
                }
                else {
                    reqsList.innerHTML += text;
                    current_value += 20;
                }
                truncateText('.card-description', 90)
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
}, 1000));


