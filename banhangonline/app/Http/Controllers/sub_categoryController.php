<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Sub_category;

class sub_categoryController extends Controller
{
    private $Sub_category;

    public function __construct(Sub_category $Sub_category)
    {
        $this->Sub_category = $Sub_category;
    }


    public function index($c_id)
    {
        $categories = DB::table('category')->get();
        return view('admin.sub_category.index', compact('categories'));
    }

    public function create($c_id)
    {
        $categories = $this->category->all();
        return view('admin.category.add', compact('categories'));
    }

    public function store(Request $request){
        // dd($request);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $categoryCreate = $this->category->create([
                'category_name' => $request->category_name,
                'category_status' => '1',
            ]);

            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($c_id ,$id)
    {
        $category = $this->category->findOrfail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $this->category->where('id', $id)->update([
                'category_name' => $request->category_name,
                // 'category_status' => $request->category_status
                'category_status' => $request->select_index,
            ]);

            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $category = $this->category->find($id);
            $category->delete($id);
            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
