@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('item.store') }}">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Sản Phẩm
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_name" required="">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Danh Mục - Danh Mục Phụ
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<select class="chosen-select search_select category_id" name="category_id">
			                			@foreach($categories as $category)
											<option value="<?php echo $category->id ?>">{{ $category->category_name }}</option>
			                			@endforeach
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<select class="chosen-select search_select sub_category_id" name="sub_category_id">
			                			@foreach($sub_category as $value)
											<option value="<?php echo $value->id ?>" class="sub_category_item">{{ $value->sub_category_name }}</option>
			                			@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Đơn Giá
							</div>
							<div class="input_form">
								<input type="text" name="item_prices" required="" pattern="[0-9]*"
								title="Vui lòng nhập vào một số nguyên dương">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Hình Ảnh
							</div>
							<div class="input_form image_loader">
								<label class="W100" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-upload"></i>
								</label>
								<div class="image_loading">
									<img src="" >
								</div>
								<input type="text" name="item_image" value="" style="display: none;" required>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả
							</div>
							<div class="input_form">

								<textarea class="summernote" name="item_detail" style="min-height: 200px;" required=""></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Thêm</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		    <!-- Modal content-->
			    <div class="modal-content">
			      	<div class="modal-body list_image_library" style="overflow: hidden;">

			      	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/library.js') }}"></script>
<script src="{{ asset('js/item_add.js') }}"></script>
				
@endsection()