<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Barryvdh\DomPDF\Facade\Pdf;


class ResultReportController extends Controller
{
    Public function resultView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();
        return view('backend.report.student_result.student_result_view',$data);

    }


    public function resultGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        // $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();  ///Tutor Line
        $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();
        if ($singleResult == true) {
            $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id','assign_subject_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->groupBy('assign_subject_id')->get();
            // dd($data['allData']->toArray());

            $pdf = PDF::loadview('backend.report.student_result.student_result_pdf', $data);
            return $pdf->stream('document.pdf');
        }//End If Condition
        else
        {
            $notification = array(
                'message' => 'Sorry No Data Found for This Criteria',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }

    }//END METHOD






//////=== ID CARD FUNCTIONS =====//////

    public function idcardView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.report.idcard.idcard_view',$data);
    }


    public function idcardGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();

        if($check_data == true)
        {
            $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
            // dd($data['allData']->toArray());

            $pdf = PDF::loadview('backend.report.idcard.idcard_pdf', $data);
            return $pdf->stream('document.pdf');
        }
        else
        {
            $notification = array(
                'message' => 'Sorry No Data Found for This Criteria',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }



}
