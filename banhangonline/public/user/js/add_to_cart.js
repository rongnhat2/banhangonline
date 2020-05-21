$('.Add_to_cart').on('click',function(){
// console.log(1)
	let item_id = $('input[name="item_id"]').val();
	let item_prices = $('input[name="item_prices"]').val();
    let item_size = $(this).find('.size').val();
    let index = $(this).index()
    // lấy tất cả giá trị input với name
    // let size = $("input[name='size[]']").map(function(){return $(this).val();}).get();
	var _token = $('input[name="_token"]').val();

	console.log()
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/Add_to_cart",
        type: "GET",
        data: {
            item_id: item_id,
            item_prices: item_prices,
            item_size: item_size,
        },
        success:function(data){ //dữ liệu nhận về
        	console.log(data)
        	$('.shopping_cart_icon').find('.count').html(data);
        	$('.Add_to_cart').eq(index).addClass('is-close')
        	$('.Add_to_cart').eq(index).html('Đã thêm');
            // loại bỏ function khỏi class
            $('.Add_to_cart').eq(index).unbind();
            $('.is-select').eq(index).unbind();
	    },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
});