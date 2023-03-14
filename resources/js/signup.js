let changeText = true;

$(function() {
    let elements = $('input');
    $.each(elements, function(index, element){
        let label = $(element).prev('label');
        if ($(element).val() !== '') {
            label.addClass('active');
        }
    });
});

$('.form').find('input').on('keyup blur focus', function (e) {
    let $this = $(this),
        label = $this.prev('label');

    if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (e.type === 'focus') {

        if( $this.val() === '' ) {
            label.removeClass('highlight');
        }
        else if( $this.val() !== '' ) {
            label.addClass('highlight');
        }
    }
});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  if (changeText) {
      const inputs = $('.tab-content ' + target + ' input');
      $.each(inputs, function (index, input) {
          $(input).val('');
          let label = $(input).prev('label');
          label.removeClass('active');
      });
      changeText = !changeText;
  }

  $(target).fadeIn(600);

});

function active_tab(hash) {
    element = ".tab-link[href='#" + hash + "']"
    $(element).parent().addClass('active');
    $(element).parent().siblings().removeClass('active');

    target = $(element).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);
}

const urlParams = new URLSearchParams(window.location.search);
active_tab(urlParams.get('tab'));

window.addEventListener('popstate', function () {
    const urlParams = new URLSearchParams(window.location.search);
    active_tab(urlParams.get('tab'));
});
