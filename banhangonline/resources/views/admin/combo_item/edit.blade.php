@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Combo
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên combo
							</div>
							<div class="input_form">
								<input type="text" name="comboitem_name" required="" value="<?php echo $combo_item->combo_item_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Sản Phẩm 1
							</div>
							<div class="input_form">
								<select name="item_01">
		                			@foreach($items as $value)
										<option value="<?php echo $value->id ?>" {{ $value->id == $combo_item->id_item_01 ? 'selected' : '' }}>{{ $value->item_name }}</option>
		                			@endforeach
								</select>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Sản Phẩm 2
							</div>
							<div class="input_form">
								<select name="item_02">
		                			@foreach($items as $value)
										<option value="<?php echo $value->id ?>" {{ $value->id == $combo_item->id_item_02 ? 'selected' : '' }}>{{ $value->item_name }}</option>
		                			@endforeach
								</select>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Sản Phẩm 3
							</div>
							<div class="input_form">
								<select name="item_03">
		                			@foreach($items as $value)
										<option value="<?php echo $value->id ?>" {{ $value->id == $combo_item->id_item_03 ? 'selected' : '' }}>{{ $value->item_name }}</option>
		                			@endforeach
								</select>
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
	</div>
</div>
				
@endsection()