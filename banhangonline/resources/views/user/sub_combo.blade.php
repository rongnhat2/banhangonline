@extends('user.layout')
@section('body')
	<div class="body_content_wrapper body_category">
		<div class="wrapper">
			<div class="body_category_aside">
				<div class="I-body_category">
					<div class="title">
						Gợi ý Combo
					</div>
					<div class="content">
						<ul>
							<li><a href="{{ route('customer.allcombo') }}">Tất Cả Combo</a></li>
							<?php foreach ($ramdom_combo as $key => $value): ?>
								<li><a href="{{ route('customer.subcombo', ['id' => $value->id]) }}"><?php echo $value->combo_item_name ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="body_category_content">
				<div class="I-sub_category_list">
					<div class="title">
						<div class="name">
							Combo đang chọn : <span><?php echo $combo->combo_item_name ?></span>
						</div>
					</div>
					<div class="content">
						<div class="sub_category_list_item">
							<div class="for_user_list_item">
								<a href="{{ route('customer.item', ['id' => $combo->item_01->id]) }}" class="for_user_item skin_item" target="_blank">
									<div class="item_image">
										<img src="{{ asset($combo->item_01->item_image) }}">
									</div>
									<div class="item_title">
										<?php echo $combo->item_01->item_name ?>
									</div>
									<div class="item_prices">
										@if ( $combo->item_01->item_discount != 0 )
											<?php echo number_format($combo->item_01->item_prices - ($combo->item_01->item_prices  * $combo->item_01->item_discount / 100)). " đ" ?> 
										@else
											<?php echo number_format($combo->item_01->item_prices). " đ" ?> 
										@endif
									</div>
									@if ( $combo->item_01->item_discount != 0 )
										<div class="item_origin_prices">
											<span class="origin"><?php echo number_format($combo->item_01->item_prices). " đ" ?> </span><span class="discount"><?php echo $combo->item_01->item_discount .' %' ?></span>
										</div>
									@endif
								</a>
								<a href="{{ route('customer.item', ['id' => $combo->item_02->id]) }}" class="for_user_item skin_item" target="_blank">
									<div class="item_image">
										<img src="{{ asset($combo->item_02->item_image) }}">
									</div>
									<div class="item_title">
										<?php echo $combo->item_02->item_name ?>
									</div>
									<div class="item_prices">
										@if ( $combo->item_02->item_discount != 0 )
											<?php echo number_format($combo->item_02->item_prices - ($combo->item_02->item_prices  * $combo->item_02->item_discount / 100)). " đ" ?> 
										@else
											<?php echo number_format($combo->item_02->item_prices). " đ" ?> 
										@endif
									</div>
									@if ( $combo->item_02->item_discount != 0 )
										<div class="item_origin_prices">
											<span class="origin"><?php echo number_format($combo->item_02->item_prices). " đ" ?> </span><span class="discount"><?php echo $combo->item_02->item_discount .' %' ?></span>
										</div>
									@endif
								</a>
								<a href="{{ route('customer.item', ['id' => $combo->item_03->id]) }}" class="for_user_item skin_item" target="_blank">
									<div class="item_image">
										<img src="{{ asset($combo->item_03->item_image) }}">
									</div>
									<div class="item_title">
										<?php echo $combo->item_03->item_name ?>
									</div>
									<div class="item_prices">
										@if ( $combo->item_03->item_discount != 0 )
											<?php echo number_format($combo->item_03->item_prices - ($combo->item_03->item_prices  * $combo->item_03->item_discount / 100)). " đ" ?> 
										@else
											<?php echo number_format($combo->item_03->item_prices). " đ" ?> 
										@endif
									</div>
									@if ( $combo->item_03->item_discount != 0 )
										<div class="item_origin_prices">
											<span class="origin"><?php echo number_format($combo->item_03->item_prices). " đ" ?> </span><span class="discount"><?php echo $combo->item_03->item_discount .' %' ?></span>
										</div>
									@endif
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()


