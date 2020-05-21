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
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="category_index" class="select_index">
											<input type="hidden" name="category_value" class="select_value">
											<input type="hidden" name="category_id" class="select_option_id">
											<div class="select_item"> </div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($categories as $category)
												<option value="<?php echo $category->id ?>">{{ $category->category_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="sub_category_index" class="select_index">
											<input type="hidden" name="sub_category_value" class="select_value">
											<input type="hidden" name="sub_category_id" class="select_option_id">
											<div class="select_item"> </div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($sub_category as $value)
												<option value="<?php echo $value->id ?>">{{ $value->sub_category_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="input_wrapper" style="display: none;">
							<div class="checkbox_item_wrapper">
								<div class="checkbox_item layout_wrapper_05">
									<div class="I-checkbox checkbox pd-0">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												S
											</div>
										</label>
										<input type="checkbox" name="size[]" value="S" checked>
									</div>
								</div>
								<div class="checkbox_item layout_wrapper_05">
									<div class="I-checkbox checkbox pd-0">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												M
											</div>
										</label>
										<input type="checkbox" name="size[]" value="M" checked>
									</div>
								</div>
								<div class="checkbox_item layout_wrapper_05">
									<div class="I-checkbox checkbox pd-0">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												L
											</div>
										</label>
										<input type="checkbox" name="size[]" value="L" checked>
									</div>
								</div>
								<div class="checkbox_item layout_wrapper_05">
									<div class="I-checkbox checkbox pd-0">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												XL
											</div>
										</label>
										<input type="checkbox" name="size[]" value="XL" checked>
									</div>
								</div>
								<div class="checkbox_item layout_wrapper_05">
									<div class="I-checkbox checkbox pd-0">
										<label>
											<div class="rect">
												<i class="fas fa-check"></i>
											</div>
											<div class="text">
												XXL
											</div>
										</label>
										<input type="checkbox" name="size[]" value="XXL" checked>
									</div>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Đơn Giá
							</div>
							<div class="input_form">
								<input type="number" name="item_prices" required="">
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
								<input type="text" name="item_image" value="" style="display: none;">
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
			      	<div class="modal-body" style="overflow: hidden;">
						<?php foreach ($gallery as $key => $value): ?>
							<div class="I-image">
								<div class="image_wrapper">
									<img src="{{asset($value->image_url)}}">
								</div>
								<div class="image_url">
									{{asset($value->image_url)}}
								</div>
								<div class="image_title">
									<?php echo $value->image_name ?>
								</div>
							</div>
						<?php endforeach ?>
			      	</div>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$('.I-image').on('click', function(e){
				var image = $(this).find('.image_url').text()
		        $('.image_loading').find('img').attr('src', image)
		        $('.image_loader').find('input').attr('value', image)
			})
		</script>
	</div>
</div>
				
@endsection()