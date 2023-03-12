let current_value = 6;
let max_scroll = true;
const reqsList = document.querySelector('.card-request--list');

$(window).scroll(setTimeout(function() {
    console.log(max_scroll);
    console.log(current_value);
    if(max_scroll && $(window).scrollTop() + $(window).height() >= $(document).height() - 2000) {
        $.ajax({
            url: '/req-scroll',
            method: 'GET',
            data: {start: current_value},
            success: function (text) {
                console.log(text);
                if (!text) {
                    max_scroll = false;
                }
                else {
                    reqsList.innerHTML += text;
                    current_value += 20;
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
}, 1000));

