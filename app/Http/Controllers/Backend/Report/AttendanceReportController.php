<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function attendReportView()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.report.attendance_report.attendance_report_view',$data);
    }

    public function attendReportGet(Request $request){

    	$employee_id = $request->employee_id;
    	if ($employee_id != '') {
    		$where[] = ['employee_id',$employee_id];
    	}
    	$date = date('Y-m', strtotime($request->date));
    	if ($date != '') {
    		$where[] = ['date','like',$date.'%'];
    	}

    $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();

    if ($singleAttendance == true) {
    	$data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
    	// dd($data['allData']->toArray());

    	$data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();

    	$data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();

    	$data['month'] = date('m-Y', strtotime($request->date));

        $pdf = PDF::loadview('backend.report.attendance_report.attendance_report_pdf', $data);
        return $pdf->stream('document.pdf');

    }else{
    	
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
    }


    } // end Method 

            




}
