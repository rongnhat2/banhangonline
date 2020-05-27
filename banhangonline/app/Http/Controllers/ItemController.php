<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Item;
use App\Gallery;

class ItemController extends Controller
{
    private $item;
    private $gallery;

    public function __construct(Item $item, Gallery $gallery)
    {
        $this->item = $item;
        $this->gallery = $gallery;
    }


    public function index()
    {
        $items = DB::table('item')
            ->join('category', 'item.category_id', '=', 'category.id')
            ->join('sub_category', 'item.sub_category_id', '=', 'sub_category.id')
            ->select('item.*', 'sub_category.sub_category_name', 'category.category_name')
            ->get();
        // dd($item);
        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $items = $this->item->all();
        $categories = DB::table('category')->get();
        $sub_category = DB::table('sub_category')->get();
        $gallery = $this->gallery->all();
        return view('admin.item.add', compact('items', 'categories', 'sub_category', 'gallery'));
    }

    public function store(Request $request){
    	// dd($request);
    	try {
            DB::beginTransaction();
            //Insert data to user table
            $id = $this->item->insertGetId([
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'item_name' => $request->item_name,
                'item_prices' => $request->item_prices,
                'item_image' => $request->item_image,
                'item_discount' => '0',
                'item_amount' => '0',
                'item_detail' => $request->item_detail,
                'item_view' => '0',
            ]);

            foreach ($request->size as $key => $value) {
                DB::table('size')->insert([
                    'item_id'           => $id,
                    'size_name'         => $value,
                    'item_size_amount'  => '0',
                ]);
            }

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        // dd($items);

        // lấy ra  Item cần sửa
        $items = DB::table('item')
            ->join('category', 'item.category_id', '=', 'category.id')
            ->join('sub_category', 'item.sub_category_id', '=', 'sub_category.id')
            ->where('item.id', $id)
            ->select('item.*', 'sub_category.sub_category_name', 'category.category_name')
            ->first();

        // lấy ra danh mục chính
        $categories = DB::table('category')->get();

        // lấy ra danh mục phụ
        $sub_category = DB::table('sub_category')
            ->where('category_id', '=', $items->category_id)
            ->get();

        // lấy ra thư viện ảnh
        $gallery = $this->gallery->all();

        // trả về view
        return view('admin.item.edit', compact('items', 'categories', 'sub_category', 'gallery'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // update user tabale
            $this->item->where('id', $id)->update([
                'sub_category_id' => $request->sub_category_id,
                'item_name' => $request->item_name,
                'item_prices' => $request->item_prices,
                'item_image' => $request->item_image,
                'item_detail' => $request->item_detail,
            ]);

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $item = $this->item->find($id);
            $item->delete($id);
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }

    // ajax item
    public function getItem(Request $request)
    {   
        $item = DB::table('item')
            ->join('category', 'item.category_id', '=', 'category.id')
            ->join('sub_category', 'item.sub_category_id', '=', 'sub_category.id')
            ->select('item.*', 'sub_category.sub_category_name', 'category.category_name')
            ->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('item.item_name', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('category.category_name', 'like', '%'.$request->value[1].'%');
            })
            ->when(!empty($request->value[2]), function ($query) use ($request) {
                return $query->where('sub_category.sub_category_name', 'like', '%'.$request->value[2].'%');
            })
            ->get();
        return $item;
    }

    // ajax sub_category
    public function getSubcategory(Request $request)
    {   
        $item = DB::table('sub_category')
            ->where('category_id', '=', $request->value)
            ->get();
        return $item;
    }


}
