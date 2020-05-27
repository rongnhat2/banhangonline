@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Danh Mục
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Danh Mục
							</div>
							<div class="input_form">
								<input type="text" name="sub_category_name" value="{{ $sub_category->sub_category_name }}">
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
									<img src="{{ asset($sub_category->sub_category_image) }}" >
								</div>
								<input type="text" name="sub_category_image" value="<?php echo $sub_category->sub_category_image ?>" style="display: none;">
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