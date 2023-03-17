let current_value = 9;
let max_scroll = true;
let reqsList = document.querySelector('.card-request--list');

$(window).scroll(_.debounce(function() {
    if(max_scroll && $(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
        let pageInfo = reqsList.dataset.page;
        let game = reqsList.dataset.game;
        $.ajax({
            url: '/req-scroll',
            method: 'GET',
            data: {start: current_value, page: pageInfo, game_id: game},
            success: function (text) {
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
}, 500));


