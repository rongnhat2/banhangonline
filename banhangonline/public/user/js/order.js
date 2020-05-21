$('.open_remove').on('click', function(){
	var father = $(this).parent().parent()
	$('.id_cart_item').val(father.find('.data_id').val())
    $('.amount_cart_item').val(father.find('.data_amount').val())
    $('.size_cart_item').val(father.find('.data_size').val())
})

$('.list_array_item').each(function( index ) {
    let cart_id = $(this).find('.data_id').val();
    let cart_amount = $(this).find('.data_amount').val();
    let cart_size = $(this).find('.data_size').val();

    $(this).find('.down_calc').on('click', function(){

        // lấy số lượng hiện tại
        var data = $(this).parent().find('.val_calc').html()

        // đơn giá 
        var single_price = $(this).parent().parent().parent().find('.single_price').attr('value')

        // min = 1
        if (data > 1) {
            // giảm số lượng
            data = data - 1;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/UpdateAmount",
                type: "GET",
                data: {
                    cart_id: cart_id,
                    cart_size: cart_size,
                    cart_amount: '-1',
                },
                success:function(data){ //dữ liệu nhận về
                    console.log(data)
                    $('.cart_value_wrapper').html(data['qty_cart']);
                    $('.totalPrice').html(format(data['price_cart']));
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            })
        }
        var count_prices = data * single_price;
        $(this).parent().parent().parent().find('.count_prices').html(format(count_prices)  + " Đồng")
        $(this).parent().find('.value_input').val(data)
        $(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())

    })
    $(this).find('.up_calc').on('click', function(){

        // lấy số lượng hiện tại
        var data = $(this).parent().find('.val_calc').html()

        // tăng số lượng
        data = data - -1;

        // đơn giá 
        var single_price = $(this).parent().parent().parent().find('.single_price').attr('value')

        // gán giá trị số lượng vào input
        $(this).parent().find('.value_input').val(data)

        // gán giá trị số lượng hiển thị
        $(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())

        // tính tổng tiền
        var count_prices = data * single_price;

        // gán giá trị tổng tiền
        $(this).parent().parent().parent().find('.count_prices').html(format(count_prices) + " Đồng")

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/UpdateAmount",
            type: "GET",
            data: {
                cart_id: cart_id,
                cart_size: cart_size,
                cart_amount: '1',
            },
            success:function(data){ //dữ liệu nhận về
                console.log(data)
                $('.cart_value_wrapper').html(data['qty_cart']);
                $('.totalPrice').html(format(data['price_cart']));
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        })
    })


});
// $('.I-order').find('.val_calc').html($('.I-order').find('.value_input').val())



$('.remove_item').on('click',function(){
    let cart_id = $('.id_cart_item').val();
    let cart_amount = $('.amount_cart_item').val();
    let cart_size = $('.size_cart_item').val();
    var _token = $('input[name="_token"]').val();
    $('.item_'+cart_id+'_'+cart_size).remove();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/Remove_item",
        type: "GET",
        data: {
            cart_id: cart_id,
            cart_amount: cart_amount,
            cart_size: cart_size,
        },
        success:function(data){ //dữ liệu nhận về
            console.log(data)
            $('.cart_value_wrapper').html(data['qty_cart']);
            $('.totalPrice').html(format(data['price_cart']));
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
});
function format(x) {
    return isNaN(x)?"":x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}