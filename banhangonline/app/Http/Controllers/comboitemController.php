<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ComboItem;

class comboitemController extends Controller
{

    private $comboitem;

    public function __construct(ComboItem $comboitem)
    {
        $this->comboitem = $comboitem;
    }



    public function index()
    {
        $combo_item = DB::table('combo_item')->get();
        foreach ($combo_item as $key => $value) {
	        $value->item_image_01 = DB::table('combo_item')
	        	->where('combo_item.id', '=', $value->id)
	            ->join('item', 'item.id', '=', 'combo_item.id_item_01')
	            ->first()->item_image;
	        $value->item_image_02 = DB::table('combo_item')
	        	->where('combo_item.id', '=', $value->id)
	            ->join('item', 'item.id', '=', 'combo_item.id_item_02')
	            ->first()->item_image;
	        $value->item_image_03 = DB::table('combo_item')
	        	->where('combo_item.id', '=', $value->id)
	            ->join('item', 'item.id', '=', 'combo_item.id_item_03')
	            ->first()->item_image;
        }
        	// dd($combo_item);
        return view('admin.combo_item.index', compact('combo_item'));
    }

    public function create()
    {
        $items = DB::table('item')
            ->join('category', 'item.category_id', '=', 'category.id')
            ->join('sub_category', 'item.sub_category_id', '=', 'sub_category.id')
            ->select('item.*', 'sub_category.sub_category_name', 'category.category_name')
            ->get();
        return view('admin.combo_item.add', compact('items'));
    }

    public function store(Request $request){
        // dd($request);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $comboitemCreate = $this->comboitem->create([
                'combo_id' => '1',
                'combo_item_name' => $request->comboitem_name,
                'id_item_01' => $request->item_01,
                'id_item_02' => $request->item_02,
                'id_item_03' => $request->item_03,
            ]);

            DB::commit();
            return redirect()->route('comboitem.index');
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
        $items = DB::table('item')
            ->join('category', 'item.category_id', '=', 'category.id')
            ->join('sub_category', 'item.sub_category_id', '=', 'sub_category.id')
            ->select('item.*', 'sub_category.sub_category_name', 'category.category_name')
            ->get();
        $combo_item = DB::table('combo_item')
        	->where('combo_item.id', '=', $id)
        	->first();
        	// dd($combo_item);
        return view('admin.combo_item.edit', compact('items', 'combo_item'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request ,$id)
    {
        // dd( $id);
        try {
            DB::beginTransaction();
            // update user tabale
            $this->comboitem->where('id', $id)->update([
                'combo_item_name' => $request->comboitem_name,
                'id_item_01' => $request->item_01,
                'id_item_02' => $request->item_02,
                'id_item_03' => $request->item_03,
            ]);

            DB::commit();
            return redirect()->route('comboitem.index');
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
            $category = $this->comboitem->find($id);
            $category->delete($id);
            DB::commit();
            return redirect()->route('comboitem.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

}
