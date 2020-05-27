@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Combo
					</div>
					<div class="title_side">
						<a href="{{ route('comboitem.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Tên Combo</th>
					        <th>Sản Phẩm</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($combo_item as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->combo_item_name }}</td>
					        <td>
								<div class="combo_image">
									<div class="item_image">
										<img src="{{ asset($value->item_image_01) }}">
									</div>
									<div class="item_image">
										<img src="{{ asset($value->item_image_02) }}">
									</div>
									<div class="item_image">
										<img src="{{ asset($value->item_image_03) }}">
									</div>
								</div>
						    </td>
					        <td>
					        	<a href="{{ route('comboitem.edit', ['id' => $value->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('comboitem.delete', ['id' => $value->id]) }}" class="action_table">
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