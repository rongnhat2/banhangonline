
$('.search_button').on('click', function(){
    // console.log($(this).hasClass('borrow_back'))
    var URL = "";
    if ($(this).hasClass('item')) {
        URL = "/item/getItem"
    }else if ($(this).hasClass('warehouse')) {
        URL = "/warehouse/getWarehouse"
    }else if ($(this).hasClass('borrow_all')) {
        URL = "/borrow_all/getBorrow"
    }
	rows = $('.search_table').find('.input')
	col = []
	for (i = 0; i < rows.length; i++) {
		col[i] = rows.eq(i).find('input').val()
	}
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: URL,
        type: "GET",
        data: {
            value: col,
        },
        success:function(data){ //dữ liệu nhận về
            console.log(data)
            $('.item_output').remove();  
            if ($('.search_button').hasClass('item')) {item(data)}
            if ($('.search_button').hasClass('warehouse')) {warehouse(data)}
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
})

function item(data){
    for (var i = 0; i < data.length; i++) {
        $('.list_output').append( 
            '<tr class="item_output">'                      +
            '    <td>'+ (i - -1) +'</td>'                   +
            '    <td>'+ data[i].item_name +'</td>'           +
            '    <td>'+ data[i].category_name +'</td>'          +
            '    <td>'+ data[i].sub_category_name +'</td>'          +
            '    <td>'+ data[i].item_prices +'</td>'          +
            '    <td>'+ data[i].item_amount +'</td>'          +
            '    <td><a href="/useritem/'+ data[i].id +'" class="action_table"> <i class="far fa-eye"></i> </a></td>'         +
            '    <td><a href="/item/edit/'+ data[i].id +'" class="action_table"> <i class="far fa-edit"></i> </a></td>'         +
            '    <td><a href="/item/delete/'+ data[i].id +'" class="action_table"> <i class="far fa-trash-alt"></i></a></td>'         +
            '</tr> '                              
        );
    }  
}

function warehouse(data){
    for (var i = 0; i < data.length; i++) {
        $('.list_output').append( 
            '<tr class="item_output">'                      +
            '    <td>'+ (i - -1) +'</td>'                   +
            '    <td>'+ data[i].username +'</td>'           +
            '    <td>'+ data[i].item_name +'</td>'          +
            '    <td>'+ data[i].size +'</td>'               +
            '    <td>'+ data[i].qty_item +'</td>'           +
            '    <td>'+ data[i].updated_at +'</td>'         +
            '</tr> '                              
        );
    }  
}
