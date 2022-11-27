<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;


class FeeCategoryController extends Controller
{
    public function viewFeeCat()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat',$data);
    }
    

    public function feeCatAdd()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function feeCatStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Fee Category Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }


    public function feeCatEdit($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat',compact('editData'));
    }


    public function feeCatUpdate(Request $request, $id)
    {
        $data = FeeCategory::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Fee Category Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }


    public function feeCatDelete($id)
    {
        $user = FeeCategory::find($id);
        $user->delete();

        $notification  = array(
            'message' => 'Fee Category Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.view')->with($notification);
    }
    
    


    





    
}
