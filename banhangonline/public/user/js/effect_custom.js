var stickyNav = $('.header').offset().top;

window.onscroll = function() {
	NavFixed();
}
function NavFixed() {
  	if (window.pageYOffset > stickyNav) {
  		$('.header').addClass('scroll')
  	} else {
  		$('.header').removeClass('scroll')
  	}
}
$('.navigation_respon').on('click', function(){
	$('.I-respon_category').toggleClass('is-open')
})


$('.I-item').find('.item_size').find('li').on('click', function(){
	$(this).toggleClass('is-select')
})

$('.I-item').find('.reduction').on('click', function(){
	var data = $(this).parent().find('.value_input').val()
	if (data > 0) data = data - 1;
	$(this).parent().find('.value_input').val(data)
	$(this).parent().find('.value').html($(this).parent().find('.value_input').val())
})
$('.I-item').find('.increase').on('click', function(){
	var data = $(this).parent().find('.value_input').val()
	data = data - -1;
	$(this).parent().find('.value_input').val(data)
	$(this).parent().find('.value').html($(this).parent().find('.value_input').val())
})

$('.I-item').find('.item_order').find('.value').on('click', function(){
	$(this).toggleClass('is-select')
})
