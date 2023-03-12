$('.form').find('input').on('keyup blur focus', function (e) {

  var $this = $(this),
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

  $(target).fadeIn(600);

});

function active_tab(hash) {
    element = ".tab-link[href='" + hash + "']"
    $(element).parent().addClass('active');
    $(element).parent().siblings().removeClass('active');

    target = $(element).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);
}

active_tab(window.location.hash)

window.addEventListener('hashchange', function () {
    active_tab(window.location.hash);
});
