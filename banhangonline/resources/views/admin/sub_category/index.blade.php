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
						<a href="{{ route('sub_category.add', ['c_id' => $c_id]) }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Tên Danh Mục</th>
					        <th>Số Lượng Sản Phẩm</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($sub_category as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->sub_category_name }}</td>
					        <td>
					        	<?php if (empty ($count_item[$value->id][0])): ?>
						        	<?php echo 0 ?>
					        	<?php else:  ?>
					        		<?php echo $count_item[$value->id][0]->total ?>
						        <?php endif ?>
						    </td>
					        <td>
					        	<a href="{{ route('sub_category.edit', ['c_id' => $c_id, 'id' => $value->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('sub_category.delete', ['c_id' => $c_id, 'id' => $value->id]) }}" class="action_table">
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