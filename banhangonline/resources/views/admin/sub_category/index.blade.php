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
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Tên Danh Mục</th>
					        <th>Số Lượng Sản Phẩm</th>
					        <th>Trạng Thái</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($categories as $category)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $category->category_name }}</td>
					        <td>{{ $category->category_name }}</td>
					        <td>
					        	<?php if ( $category->category_status  == 1): ?>
						        	<div class="status_table bg_success text_light">
						        		Hiển Thị
						        	</div>
					        	<?php elseif( $category->category_status  == 0): ?>
						        	<div class="status_table bg_danger text_light">
						        		Tạm Ẩn
						        	</div>
					       		<?php endif ?>
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
				
@endsection()