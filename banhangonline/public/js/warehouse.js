$('.add_new_warehouse').on('click', function(){
	// var id = $(this).parent().parent().parent().find('.select_option_id').val()
	// var name = $(this).parent().parent().parent().find('.select_value').val()
	// var amount = $(this).parent().parent().parent().find('.item_amount_input').val()
	// var size = $(this).parent().parent().parent().find('.size_id').val()
	var id = $("select[name='category_id']").val()
	var name = $("select[name='category_id'] option:selected").text()
	var amount = $("input[name='amount']").val()
	var size = $("select[name='size_id']").val()

	console.log(id, name, amount, size)
	// lấy value
	// console.log($("select[name='category_id']").val())
	// lấy text được chọn của option
	// console.log($("select[name='category_id'] option:selected").text())
    var component =   	
    	'<tr>'
    +  		'<input type="hidden" name="item_id[]" value="'+id+'">'
	+       '<td>'+name+'</td>'
	+       '<td><input type="hidden" name="item_size[]" value="'+size+'">'+size+'</td>'
	+       '<td><input type="hidden" name="item_amount[]" value="'+amount+'">'+amount+'</td>'
	+       '<td>'
	+       	'<a class="action_table">'
	+        		'<i class="far fa-trash-alt"></i>'
	+        	'</a>'
	+       '</td>'
    +  	'</tr>'
    if (id != '' && name != '' && amount != '' && size != '') {
		$('.warehouse_wrapper').append(component);
		$("select[name='category_id']").val('')
		$("select[name='category_id'] option:selected").text('')
		$("input[name='amount']").val('')
		$("select[name='size_id']").val('')
	}
	$('.action_table').on('click', function(){
		$(this).parent().parent().remove()
	})
})


function sortListDir(n) {
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.getElementById("myTable");
	switching = true;
	dir = "asc";
	while (switching) {
	    switching = false;
	    rows = table.rows;
	    for (i = 1; i < (rows.length - 1); i++) {
	        shouldSwitch = false;
	        x = rows[i].getElementsByTagName("TD")[n];
	        y = rows[i + 1].getElementsByTagName("TD")[n];
	        if (dir == "asc") {
	            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
	                shouldSwitch = true;
	                break;
	            }
	        } else if (dir == "desc") {
	            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
	                shouldSwitch = true;
	                break;
	            }
	        }
	    }
	    if (shouldSwitch) {
	        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
	        switching = true;
	        switchcount++;
	    } else {
	        if (switchcount == 0 && dir == "asc") {
	            dir = "desc";
	            switching = true;
	        }
	    }
	}
}



