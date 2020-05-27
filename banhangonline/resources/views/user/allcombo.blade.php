@extends('user.layout')
@section('body')
<div class="I-gallery">
	<div class="wrapper">
		<div class="gallery_wrapper">
			<div class="gallery_header">
				<div class="title">
					Tất Cả Bộ Sưu Tập
				</div>
			</div>
			<div class="gallery_content">
				<div class="gallery_list_item">
					<?php foreach ($combo as $key => $value): ?>
						<a href="{{ route('customer.subcombo', ['id' => $value->id]) }}" class="gallery_item">
							<div class="content">
								<div class="title">
									<?php echo $value->combo_item_name ?>
								</div>
								<!-- <div class="count_item">
									11.111 Combo
								</div> -->
							</div>
							<div class="listimage">
								<div class="image">
									<img src="{{ asset($value->item_image_01) }}">
								</div>
								<div class="image">
									<img src="{{ asset($value->item_image_02) }}">
								</div>
								<div class="image">
									<img src="{{ asset($value->item_image_03) }}">
								</div>
							</div>
						</a>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()

