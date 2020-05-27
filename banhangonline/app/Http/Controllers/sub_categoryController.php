<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Sub_category;
use App\Gallery;

class sub_categoryController extends Controller
{
    private $Sub_category;

    public function __construct(Sub_category $Sub_category, Gallery $gallery)
    {
        $this->Sub_category = $Sub_category;
        $this->gallery = $gallery;
    }


    public function index($c_id)
    {
        $total_item = DB::raw('count(*) as total');

        // lấy tất cả danh mục
        $sub_category = DB::table('sub_category')->where('category_id', '=', $c_id)->get();
        $count_item = [];

        // thống kê số lượng sản phẩm
        foreach ($sub_category as $key => $value) {
            $count_item[$value->id] = 0;
            $count_item[$value->id] = DB::table('item')
                                        ->where('item.sub_category_id', '=', $value->id)
                                        ->select( $total_item)
                                        ->groupBy('item.sub_category_id')
                                        ->get();
        }
        // dd($c_id);
        return view('admin.sub_category.index', compact('sub_category', 'count_item', 'c_id'));
    }

    public function create($c_id)
    {
        $gallery = $this->gallery->all();
        return view('admin.sub_category.add', compact('gallery', 'c_id'));
    }

    public function store(Request $request){
        // dd($request);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $categoryCreate = $this->Sub_category->create([
                'category_id' => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_image' => $request->sub_category_image,
                'sub_category_view' => '0',
            ]);

            DB::commit();
            return redirect()->route('sub_category.index', ['c_id' => $request->category_id]);
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($c_id ,$id)
    {
        $gallery = $this->gallery->all();
        $sub_category = $this->Sub_category->findOrfail($id);
        // dd($sub_category);
        return view('admin.sub_category.edit', compact('gallery', 'sub_category', 'c_id', 'id'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $c_id ,$id)
    {
        // dd($request .' '. $c_id .' '. $id);
        try {
            DB::beginTransaction();
            // update user tabale
            $this->Sub_category->where('id', $id)->update([
                'category_id' => $c_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_image' => $request->sub_category_image,
            ]);

            DB::commit();
            return redirect()->route('sub_category.index', ['c_id' => $c_id]);
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }


    }


    public function delete($c_id ,$id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $category = $this->Sub_category->find($id);
            $category->delete($id);
            DB::commit();
            return redirect()->route('sub_category.index', ['c_id' => $c_id]);
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
