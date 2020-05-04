$('.I-checkbox').each(function(index){
    if($(this).find('input').prop("checked")){
		$(this).parent().find('label').addClass('is-select')
	}
});
$('.I-checkbox.checkbox').find('label').on('click', function(){
	if($(this).parent().find('input').prop("checked") == false){
		$(this).parent().find('input').prop("checked", true)
		$(this).addClass('is-select')
	}else{
		$(this).parent().find('input').prop("checked", false)
		$(this).removeClass('is-select')
	}
})
$('.I-checkbox.radio').find('label').on('click', function(){
	$(this).parent().parent().parent().find('input').prop("checked", false);
	$(this).parent().parent().parent().find('label').removeClass('is-select')
	
	if($(this).parent().find('input').prop("checked") == false){
		$(this).parent().find('input').prop("checked", true)
		$(this).addClass('is-select')
	}else{
		$(this).parent().find('input').prop("checked", false)
		$(this).removeClass('is-select')
	}
})

$('body').on('click', function(){
	if (!$('.select_form').hasClass('focus')) {
		$('.select_form').removeClass('is-open')
	}
})
// $('.I-checkbox').find('label').on('click', function(){
// 	$(this).toggleClass('is-select')
// })
$('.select_form').on('click', function(){
	if ($(this).hasClass('is-open')) {
		$(this).removeClass('is-open')
	}else{
		$('.select_form').removeClass('is-open')
		$(this).addClass('is-open')
	}
})
$('.select_form').on('mouseenter', function() {
    $(this).addClass('focus');
})
$('.select_form').on('mouseleave', function() {
    $(this).removeClass('focus');
})
$( ".select_form" ).each(function( index ) {
  	var option = []; 
  	$(this).find('option').each(function(i, selected){ 
        option[i] = $(selected).text(); 
    });
  	for (var i = 0; i < option.length; i++) {
  		$(this).parent().find('.option_wrapper').append(
			'<div class="option_item">'
			+	'<div class="option_text">'
			+ 		option[i]
			+ 	'</div>'
			+ '</div>'
  		)
  	}
	$('.option_item').on('click', function(){
		var value = $(this).find('.option_text').text()
		var index = $(this).index()
		$(this).parent().parent().find('.select_item').text(value)
		$(this).parent().parent().find('.select_value').val(value)
		$(this).parent().parent().find('.select_index').val(index)
	})
});
// $(".text_color").click(function(event){
//     var range = document.createRange();
//     range.selectNode(this);
//     window.getSelection().removeAllRanges(); // clear current selection
//     window.getSelection().addRange(range); // to select text
//     document.execCommand("copy");
//     window.getSelection().removeAllRanges();// to deselect
// });



