@extends('user.layout')
@section('body')
	<div class="body_content_wrapper body_category">
		<div class="wrapper">
			<div class="body_category_aside">
				<div class="I-body_category">
					<div class="title">
						Danh Mục Chính
					</div>
					<div class="content">
						<ul>
							<li><a href="{{ route('customer.allcategory') }}">Tất Cả Danh Mục</a></li>
							<?php foreach ($categories as $key => $value): ?>
								<li><a href="{{ route('customer.category', ['id' => $value->id]) }}"><?php echo $value->category_name ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="body_category_content">
				<div class="I-item">
					<input type="hidden" name="item_id" value="<?php echo $item->id ?>">
					<div class="content">
						<div class="item_image">
							<img src="{{ asset($item->item_image) }}">
						</div>
						<div class="item_detail">
							<div class="item_name">
								<?php echo $item->item_name ?>
							</div>
							<div class="item_prices">
								<div class="prices">
									@if ( $item->item_discount != 0 )
										<?php echo number_format($item->item_prices - ($item->item_prices  * $item->item_discount / 100)). " đ" ?> 
										<input type="hidden" name="item_prices" class="" value="<?php echo $item->item_prices - ($item->item_prices  * $item->item_discount / 100) ?>">
									@else
										<?php echo number_format($item->item_prices). " đ" ?> 
										<input type="hidden" name="item_prices" class="" value="<?php echo $item->item_prices ?>">
									@endif
								</div>
								<div class="origin_prices">
									@if ( $item->item_discount != 0 )
										<span class="origin"><?php echo number_format($item->item_prices). " đ" ?></span><span class="discount"><?php echo $item->item_discount .' %' ?></span>
									@endif
								</div>
							</div>
							<div class="item_detail_size">
								<div class="status_size">
									Trạng Thái: <span class="{{ $item->item_amount ? 'text-success' : 'text-danger' }}">{{ $item->item_amount ? 'Còn Hàng' : 'Hết Hàng' }}</span>
								</div>
								<?php foreach ($size as $key => $value): ?>
									<div class="status_detail">
										<div class="size_title">
											Kích Thước : <?php echo $value->size_name ?>
										</div>
										<div class="size_amount">
											@if ( $value->item_size_amount != 0 )
												<?php echo '- Còn : '. $value->item_size_amount ?>
											@else
												- Tạm hết
											@endif
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div class="item_size">
								<ul>
									<?php foreach ($size as $key => $value): ?>
										<li class="{{ $value->item_size_amount ? 'size_item' : 'is-block' }} 
											{{ $value->item_size_amount && !$has_item[$value->size_name]  ? 'Add_to_cart' : '' }}">
											<div class="size_wrapper">
												<div class="size_name">
													<?php echo $value->size_name ?>
												</div>
												<div class="size_amount">
													@if ( $value->item_size_amount != 0 )
														<?php echo 'Còn : '. $value->item_size_amount ?>
													@else
														Tạm hết
													@endif
												</div>
												<div class="size_text">
													Đã Chọn
												</div>
											</div>
											<input type="checkbox" name="size[]" value="<?php echo $value->size_name ?>" class="size" {{ $has_item[$value->size_name] ? 'checked' : '' }}>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
							<div class="item_order">
								<!-- <div class="quantity">
									<div class="action reduction">
										<i class="fas fa-minus"></i>
									</div>
									<div class="value">
										0
									</div>
									<div class="action increase">
										<i class="fas fa-plus"></i>
									</div>
									<input type="hidden" name="" class="value_input">
								</div> -->
								<div class="item_button">
									<a href="{{ route('customer.checkout') }}" style="cursor: pointer;">Đi tới giỏ hàng</a>
								</div>
								<!-- <div class="item_button buying">
									<a href="">Đặt Hàng</a>
								</div> -->
							</div>
						</div>
					</div>
					<div class="detail">
						<?php echo $item->item_detail ?>
					</div>
				</div>
				<div class="I-sub_category_list">
					<div class="title">
						<div class="name">
							Sản phẩm có liên quan
						</div>
					</div>
					<div class="content">
						<div class="sub_category_list_item">
							<div class="for_user_list_item">
								<?php foreach ($sameitem as $key => $value): ?>
									<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="for_user_item skin_item">
										<div class="item_image">
											<img src="{{ asset($value->item_image) }}">
										</div>
										<div class="item_title">
											<?php echo $value->item_name ?>
										</div>
										<div class="item_prices">
										@if ( $value->item_discount != 0 )
											<?php echo number_format($value->item_prices - ($value->item_prices  * $value->item_discount / 100)). " đ" ?> 
										@else
											<?php echo number_format($value->item_prices). " đ" ?> 
										@endif
										</div>
										@if ( $value->item_discount != 0 )
											<div class="item_origin_prices">
												<span class="origin"><?php echo number_format($value->item_prices). " đ" ?> </span><span class="discount"><?php echo $value->item_discount .' %' ?></span>
											</div>
										@endif
									</a>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('user/js/add_to_cart.js') }}"></script>
@endsection()


