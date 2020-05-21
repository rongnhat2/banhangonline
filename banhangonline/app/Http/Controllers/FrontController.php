<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function index(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // dd($cart);
        $items =  DB::table('item')->limit(4)->get();

        $item_random =  DB::table('item')->limit(20)->get();

        // lấy giữ liệu trong subcategory
        if ( count( DB::table('sub_category')->get()) < 16) {
            $sub_category = DB::table('sub_category')->get();
        }else{
            $sub_category = DB::table('sub_category')->random(16)->get();
            // $sub_category = DB::table('sub_category')->random(16)->limit(16)->get();
        }
        // dd($items);
        // $text = 'Tất Cả Sản Phẩm';
        return view('user.index', compact('categories', 'items', 'amount_item', 'sub_category', 'item_random'));
    }
    
    public function item($id){
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy ra sản phẩm All size
        $item_size =  DB::table('item')->where('item.id', '=', $id)
            ->join('size', 'item.id', '=', 'size.item_id')
            ->select('item.id as item_id', 'size.size_name as size_name')
            ->get();

        // biến kiếm tra đã tồn tại sản phẩm trong giỏ hàng
        // setup biến mặc định
        foreach ($item_size as $item_value) {
            $has_item[$item_value->size_name] = false;
        }

        //kiểm tra item đã tồn tại trong giỏ hàng hay chưa 
        if (Session('cart')) {
            foreach (Session::get('cart')->items as $key => $value) {
                foreach ($item_size as $item_value) {
                    if ($value['id'] == $item_value->item_id && $value['size'] == $item_value->size_name) {
                        $has_item[$item_value->size_name] = true;
                    }
                }
            }
        }

        // lấy ra sản phẩm
        $item =  DB::table('item')->where('id', '=', $id)->first();

        // lấy ra sản phẩm có liên quan
        if ( count( DB::table('item')->where('sub_category_id', '=', $item->sub_category_id)->get()) < 4) {
            $sameitem =  DB::table('item')->where('sub_category_id', '=', $item->sub_category_id)->where('id', '<>', $id)->get();
        }else{
            $sameitem =  DB::table('sub_category')->where('sub_category_id', '=', $item->sub_category_id)->where('id', '<>', $id)->random(4)->get();
        }
        
        // $sum_item = DB::raw('SUM(warehouse.qty_item) as total');

        // $count_ware = DB::table('warehouse')
        //                 ->where('warehouse.id_item', '=', $id)
        //                 ->select('warehouse.id_item', $sum_item)
        //                 ->groupBy('warehouse.id_item')
        //                 ->get();

        $size =  DB::table('size')->where('item_id', '=', $id)->get();

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // lấy danh mục phụ
        $sub_category = DB::table('sub_category')->where('id', '=', $item->sub_category_id)->get();
        
        return view('user.item', compact('item', 'sub_category', 'categories', 'sameitem', 'size', 'amount_item', 'has_item'));
    }
    
    public function category($id){
        
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        
        // lấy số lượng sản phẩm
        $total_item = DB::raw('count(*) as total');
        $count_item = [];
        $count_item = DB::table('item')
                        ->where('item.category_id', '=', $id)
                        ->select( $total_item)
                        ->groupBy('item.category_id')
                        ->first();
        // dd($count_item);
        // lấy danh mục đang chọn
        $this_category =  DB::table('category')->where('id', '=', $id)->first();

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // lấy danh mục phụ
        $sub_category = DB::table('sub_category')->where('category_id', '=', $id)->get();

        // lấy ra sản phẩm
        $item =  DB::table('item')->where('category_id', '=', $id)->get();
        // dd($item);


        return view('user.category', compact('sub_category', 'categories', 'this_category', 'count_item', 'item', 'amount_item'));
    }

    public function subcategory($id, $s_id){
        
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        
        // lấy số lượng sản phẩm
        $total_item = DB::raw('count(*) as total');
        $count_item = DB::table('item')
                        ->where('item.sub_category_id', '=', $s_id)
                        ->select( $total_item)
                        ->groupBy('item.sub_category_id')
                        ->first();
        // dd($count_item);

        // lấy danh mục đang chọn
        $this_category =  DB::table('category')->where('id', '=', $id)->first();

        // lấy danh mục phụ đang chọn
        $this_sub_category =  DB::table('sub_category')->where('id', '=', $s_id)->first();
        // dd($this_sub_category);
        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // lấy danh mục phụ
        $sub_category = DB::table('sub_category')->where('category_id', '=', $id)->get();

        // lấy ra sản phẩm
        $item =  DB::table('item')->where('sub_category_id', '=', $s_id)->get();


        return view('user.subcategory', compact('sub_category', 'categories', 'this_category', 'this_sub_category', 'count_item', 'item', 'amount_item'));
    }

    public function allcategory(){
        
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // lấy giữ liệu trong sub_category
        $sub_category = [];
        foreach ($categories as $key => $value) {
            $sub_category[$value->id] = DB::table('sub_category')->where('category_id', '=', $value->id)->get();
        }
        // dd($sub_category);

        return view('user.allcategory', compact('categories', 'sub_category', 'amount_item'));
    }

    
    public function checkout(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // dd($amount_item);
        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        // nếu đã tồn tại giỏ hàng, lấy sản phẩm trong giỏ hàng, hoặc trả về null
        $cart = Session('cart') ? Session::get('cart')->items : null;
        
        $item = null;
        $total_qty = 0;
        if ($cart != null) {
            // dd($cart);
            foreach ($cart as $key => $value) {
                $item[$key]['data'] = DB::table('item')->where('id', '=', $value['id'])->first();
                $item[$key]['value'] = $value['qty'];
                $item[$key]['prices'] = $value['prices'];
                $item[$key]['size'] = $value['size'];
                $total_qty += $value['prices'] * $item[$key]['value'];
            }
        }
        dd(Session('customer'));
        // dd($total_qty);
        return view('user.order', compact('categories', 'amount_item', 'item', 'total_qty'));
    }
    
    public function getLoginOrder(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        $categories = DB::table('category')->get();
        return view('user.login_order', compact('categories', 'amount_item'));
    }

    public function login(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        $categories = DB::table('category')->get();
        return view('user.login', compact('categories', 'amount_item'));
    }
    
    public function register(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        $categories = DB::table('category')->get();
        return view('user.register', compact('categories', 'amount_item'));
    }
    
}
