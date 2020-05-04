cart

		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<form action="{{route('add_to_card')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<!-- @if(Session::has('cart'))
		<?php print_r($cart)  ?>
	@endif  -->
		<div class="output">
			
		</div>
	<input type="" name="cart_name" class="cart_name">
	<input type="" name="id" class="cart_id">
	<!-- <button type="submit" class="test_ajax">Submit</button> -->
	<div class="test_ajax">Submit</div>
</form>
	<script type="text/javascript">
		$('.test_ajax').on('click',function(){
			// console.log(1)
        	let cart_name = $(this).parent().find('.cart_name').val();
        	let cart_id = $(this).parent().find('.cart_id').val();
        	 var _token = $('input[name="_token"]').val();

        	// console.log(cart_name)
		    $.ajax({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
		        url: "/demo_ajax",
		        type: "GET",
		        data: {
                    cart_name: cart_name, 
                    cart_id: cart_id
                },
		        success:function(data){ //dữ liệu nhận về
		        	// console.log()
		        	// for (var i = 0; i <= Object.size(data); i++) {
		        	// 	console.log(data[i])
		        	// }
		        	$('.item_output').remove();
		        	for(var k in data) {
		        		$('.output').append( 
		        				"<div class=\"item_output\">" +
		        					data[k].name + " : " + data[k].qty+
								"</div>"
		        			);
					   	// console.log(k, data[k]);
					}
			    },
		      	error: function () {
		        	console.log('error')
		      	}
		    })
		});
		// size của objects
		// gọi : Object.size(data)
		Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};
	</script>