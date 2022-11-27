<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function viewShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }

    public function studentShiftAdd()
    {
        return view('backend.setup.shift.add_shift');
    }


    public function studentShiftStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Student Shift Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }


    public function studentShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('editData'));
    }


    public function studentShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification  = array(
            'message' => 'Student Shift Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }


    public function studentShiftDelete($id)
    {
        $data = StudentShift::find($id);
        $data->delete();

        $notification  = array(
            'message' => 'Student Shift Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }











}
