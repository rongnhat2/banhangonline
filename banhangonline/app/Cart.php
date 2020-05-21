<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
		}
	}

	public function add($item){
        // $name = 'name';
        $id = $item->item_id;
        $prices = $item->item_prices;
        $size = $item->item_size;
        
        // dd($amount);
        $giohang = ['qty'=> 1, 'id' => $id, 'prices' => $prices, 'size' => $size];
        $this->totalQty += 1;
        $this->items[$id.'-'.$size] = $giohang;
    }

	// Xóa Sản Phẩm
	public function removeItem($id, $amount, $size){
		// dd($this->items[$id]);
		$this->totalQty -= $amount;
		// dd($this->totalQty);
		// $this->totalQty -= $this->items[$id]['qty'];
		// $this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id.'-'.$size]);
	}

	// Cập Nhật Sản Phẩm
	public function UpdateAmount($id, $amount, $size){
		// dd($this->items[$id]);
		$this->totalQty += $amount;
		$this->items[$id.'-'.$size]['qty'] += $amount;
		// dd($this->totalQty);
		// $this->totalQty -= $this->items[$id]['qty'];
		// $this->totalPrice -= $this->items[$id]['price'];
		// unset($this->items[$id]);
	}
}
