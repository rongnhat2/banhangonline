@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Sản Phẩm
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_name" required="" value="<?php echo $items->item_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Danh Mục Chính
							</div>
							<div class="input_form">
								<input type="text" name="" required="" value="{{ $items->category_name }}" readonly >
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Danh Mục Phụ
							</div>
							<div class="input_form">
								<select name="sub_category_id">
		                			@foreach($sub_category as $value)
										<option value="<?php echo $value->id ?>" {{ $value->id == $items->sub_category_id ? 'selected' : '' }}>{{ $value->sub_category_name }}</option>
		                			@endforeach
								</select>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Đơn Giá
							</div>
							<div class="input_form">
								<input type="" name="item_prices" required="" value="<?php echo $items->item_prices ?>" pattern="[0-9]*">
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
									<img src="{{ asset($items->item_image) }}" >
								</div>
								<input type="text" name="item_image" value="<?php echo $items->item_image ?>" style="display: none;">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả
							</div>
							<div class="input_form">

								<textarea class="summernote" name="item_detail" style="min-height: 200px;" required=""><?php echo $items->item_detail ?></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Cập Nhật</button>
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
				
@endsection()