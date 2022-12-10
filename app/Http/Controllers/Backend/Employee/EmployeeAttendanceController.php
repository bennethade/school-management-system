<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\Designation;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeLeave;
use App\Models\EmployeeSalaryLog;
use App\Models\FeeCategoryAmount;
use App\Models\LeavePurpose;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeAttendanceController extends Controller
{
    public function attendanceView()
    {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        // $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }

    public function attendanceAdd()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_add',$data);
    }


    public function attendanceStore(Request $request)
    {
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();///FOR EDITING ATTENDANCE
        $countemployee = count($request->employee_id);
        for($i=0; $i < $countemployee; $i++)
        {
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }//End For Loop

        $notification  = array(
            'message' => 'Employee Attendance Updated Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('employee.attendance.view')->with($notification);


    }//End Method


    public function attendanceEdit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_edit',$data);
    }


    public function attendanceDetails($date)
    {
        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details',$data);
    }






}
