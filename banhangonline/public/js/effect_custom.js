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





