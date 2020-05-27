
$('.category_id').on('change', function(){
    // console.log($(this).val())
    var category = $(this).val()
    var URL = "/item/getSubcategory";
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: URL,
        type: "GET",
        data: {
            value: category,
        },
        success:function(data){ //dữ liệu nhận về
            console.log(data)
            $('.sub_category_item').remove();  
            subcategory(data)
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
})

function subcategory(data){
    for (var i = 0; i < data.length; i++) {
        $('.sub_category_id').append( 
            '<option value="'+ data[i].id +'" class="sub_category_item">'+ data[i].sub_category_name +'</option>'                   
        );
    }  
}