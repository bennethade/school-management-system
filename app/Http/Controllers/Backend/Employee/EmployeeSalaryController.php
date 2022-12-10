<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\Designation;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\EmployeeSalaryLog;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeSalaryController extends Controller
{
    public function salaryView()
    {
        $data['allData'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view',$data);
    }

    public function salaryIncrement($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment',$data);

    }


    public function salaryStore(Request $request, $id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;  //Employee ID is equal to the User Table ID
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();

        $notification  = array(
            'message' => 'Employe Salary Increment Successful!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('employee.salary.view')->with($notification);

    }

    public function salaryDetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        // dd($data['salary_log']->toArray());
        return view('backend.employee.employee_salary.employee_salary_details',$data);
    }








}
