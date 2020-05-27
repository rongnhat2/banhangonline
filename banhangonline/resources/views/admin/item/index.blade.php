@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Sản Phẩm
					</div>
					<div class="title_side">
						<a href="{{ route('item.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead class="search_table">
			      		<tr>
					        <th></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th colspan="3"></th>
					        <th colspan="2"><button class="search_button item">Tìm Kiếm</button></th>
				      	</tr>
			    	</thead>
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 2)">ID</th>
					        <th onclick="sortListDir(1, 2)">Tên</th>
					        <th onclick="sortListDir(2, 2)">Danh mục</th>
					        <th onclick="sortListDir(3, 2)">Danh mục phụ</th>
					        <th onclick="sortListDir(4, 2)">Đơn Giá</th>
					        <th onclick="sortListDir(5, 2)">Số Lượng</th>
					        <th>Xem</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_output">
               			@foreach($items as $item)
				      	<tr class="item_output">
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->item_name }}</td>
					        <td>{{ $item->category_name }}</td>
					        <td>{{ $item->sub_category_name }}</td>
					        <td>{{ number_format($item->item_prices) . ' đ' }}</td>
					        <td>{{ $item->item_amount }}</td>
					        <td>
					        	<a href="{{ route('customer.item', ['id' => $item->id]) }}" class="action_table" target="_blank">
					        		<i class="fas fa-eye"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.delete', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/table.js') }}"></script>		
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()