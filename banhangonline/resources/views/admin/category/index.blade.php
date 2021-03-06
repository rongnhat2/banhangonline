@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Danh Mục
					</div>
					<div class="title_side">
						<a href="{{ route('category.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Tên Danh Mục</th>
					        <th onclick="sortListDir(2, 1)">Số Lượng Sản Phẩm</th>
					        <th onclick="sortListDir(3, 1)">Danh Mục Phụ</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_output">
               			@foreach($all_category as $category)
				      	<tr class="item_output">
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $category->category_name }}</td>
					        <td> {{ $category->count }} </td>
					        <td>
					        	<a href="{{ route('sub_category.index', ['c_id' => $category->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="action_table">
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
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()