<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Customer;
use App\Warehouse;
use App\Item;
use Carbon\Carbon;

class WarehouseController extends Controller
{
    private $warehouse;
    private $item;

    public function __construct(Warehouse $warehouse, Item $item)
    {
        $this->warehouse = $warehouse;
        $this->item = $item;
    }


    public function index()
    {
        $warehouse = DB::table('warehouse')
            ->join('item', 'warehouse.id_item', '=', 'item.id')
            ->select('warehouse.*', 'item.item_name as item_name')
            ->get();
        $total_item = DB::raw('Count(warehouse.qty_item) as total');
        // $count_ware = DB::table('warehouse')->where('warehouse.created_at', '=', '2020-05-10')->get();
        // $count_ware = DB::table('warehouse')
        //                 ->select('warehouse.created_at', $total_item)
        //                 ->groupBy('warehouse.created_at')
        //                 ->get();
        $count_ware = DB::table('warehouse')
                        ->select('warehouse.created_at', $total_item)
                        ->groupBy('warehouse.created_at')
                        ->get();
        // dd($count_ware);
        return view('admin.warehouse.index', compact('warehouse'));
    }

    public function create()
    {
        $items = DB::table('item')->get();
        return view('admin.warehouse.add', compact('items'));
    }

    public function store(Request $request){
        // dd($request);
        $item = $request->item_id;
        $amount = $request->item_amount;
        $size = $request->item_size;
    	try {
            DB::beginTransaction();
            $admin = Session('customer') ? Session::get('customer')->customer['username'] : null;
            // dd($admin);
        // dd(Session);
	        foreach ($item as $key => $value) {
                // dd($item[$key]);
                // dd( DB::table('item')->where('id', '=', $item[$key])->first());
                $amount_ = DB::table('item')->where('id', '=', $item[$key])->first()->item_amount + $amount[$key];
                $this->item->where('id', '=', $item[$key])->update([
                    'item_amount' => $amount_
                ]);
                // DB::table('users')->where->where('id', '=', $item[$key])->update(['item_amounts' => $amount_]);
                $this->warehouse->create([
                    'username' => $admin,
                    'id_item' => $item[$key],
                    'size' => $size[$key],
                    'qty_item' => $amount[$key],
                    "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                    "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                ]);
                DB::table('size')->where('item_id', '=', $item[$key])->where('size_name', '=', $size[$key])->update([
                    'item_size_amount' => $amount_
                ]);
	        }
            // die;
            DB::commit();
            Session::flash('success', 'Nhập Kho Thành Công');
            return redirect()->route('warehouse.index');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Bạn Phải Thêm Ít Nhất Một Đối Tượng');
            return redirect()->route('warehouse.add');
            DB::rollBack();
        }
    }


    // ajax warehouse
    public function getWarehouse(Request $request)
    {   
        $getWarehouse = DB::table('warehouse')
            ->join('item', 'warehouse.id_item', '=', 'item.id')
            ->select('warehouse.*', 'item.item_name as item_name')
            ->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('warehouse.username', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('warehouse.item_name', 'like', '%'.$request->value[1].'%');
            })
            ->when(!empty($request->value[2]), function ($query) use ($request) {
                return $query->where('warehouse.size', 'like', '%'.$request->value[2].'%');
            })
            ->when(!empty($request->value[3]), function ($query) use ($request) {
                return $query->where('warehouse.qty_item', 'like', '%'.$request->value[3].'%');
            })
            ->when(!empty($request->value[4]), function ($query) use ($request) {
                return $query->where('warehouse.updated_at', 'like', '%'.$request->value[4].'%');
            })
            ->get();
        return $getWarehouse;
    }
}
