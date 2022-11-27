<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function viewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    public function designationAdd()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function designationStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Designation Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }
    

    public function designationEdit($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
    }

    

    public function designationUpdate(Request $request, $id)
    {
        $data = Designation::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Designation Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }
    


    public function designationDelete($id)
    {
        $data = Designation::find($id);
        $data->delete();

        $notification  = array(
            'message' => 'Designation Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }






}

