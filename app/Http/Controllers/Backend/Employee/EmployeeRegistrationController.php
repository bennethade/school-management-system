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


class EmployeeRegistrationController extends Controller
{
    public function employeeView()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_registration.employee_view',$data);
    }


    public function employeeAdd()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_registration.employee_add',$data); 
    }

    public function employeeStore(Request $request)
    {
        DB::transaction(function () use($request) {
            $checkYear = date('Ym',strtotime($request->join_date));
            // dd($checkYear);
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();

            if ($employee == null) 
            {
                $firstReg = 0;
                $employeeId = $firstReg+1    ;
                if ($employeeId < 10) 
                {
                    $id_no = '000'.$employeeId;
                }
                elseif ($employeeId < 100) 
                {
                    $id_no = '00'.$employeeId;
                }
                elseif ($employeeId < 1000) 
                {
                    $id_no = '0'.$employeeId;
                }

            }//End If

            else 
                {
                    $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                    $employeeId = $employee+1;
                    if ($employeeId < 10) 
                    {
                        $id_no = '000'.$employeeId;
                    }
                    elseif ($employeeId < 100) 
                    {
                        $id_no = '00'.$employeeId;
                    }
                    elseif ($employeeId < 1000) 
                    {
                        $id_no = '0'.$employeeId;
                    }
                }//End Else

                $final_id_no = $checkYear.$id_no;
                $user = new User();
                $code = rand(0000,9999);
                $user->id_no = $final_id_no;
                $user->password = bcrypt($code);
                $user->usertype = 'employee';
                $user->code = $code;
                $user->name = $request->name;   ///DATABASE FIELD NAME FIRST. THEN REQUESTED FIELD IN VIEW FILE FOLLOWS
                $user->fname = $request->fname;
                $user->email = $request->email;
                // $user->mname = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->salary = $request->salary;
                $user->designation_id = $request->designation_id;
                $user->dob = date('Y-m-d',strtotime($request->dob));
                $user->join_date = date('Y-m-d',strtotime($request->join_date));

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/employee_images'),$filename);
                    $user['image'] = $filename;
                }//End If
                $user->save();

                $employee_salary = new EmployeeSalaryLog();
                $employee_salary->employee_id = $user->id;
                $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
                $employee_salary->previous_salary = $request->salary;
                $employee_salary->present_salary = $request->salary;
                $employee_salary->increment_salary = '0';
                $employee_salary->save();

                

        });

        $notification  = array(
            'message' => 'Employee Inserted Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('employee.registration.view')->with($notification);



    } //End Method


    public function employeeEdit($id)
    {
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_registration.employee_edit',$data);
    }

    public function employeeUpdate(Request $request, $id)
    {
        
                $user =  User::find($id);
                $user->name = $request->name;   ///DATABASE FIELD NAME FIRST. THEN REQUESTED FIELD IN VIEW FILE FOLLOWS
                $user->fname = $request->fname;
                $user->email = $request->email;
                // $user->mname = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                // $user->salary = $request->salary;
                $user->designation_id = $request->designation_id;
                $user->dob = date('Y-m-d',strtotime($request->dob));

                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('upload/employee_images/'.$user->image));
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/employee_images'),$filename);
                    $user['image'] = $filename;
                }//End If
                $user->save();

        $notification  = array(
            'message' => 'Employee Updated Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('employee.registration.view')->with($notification);



    } //End Method


    public function employeeDetails($id)
    {
        $data['details'] = User::find($id);
        
        $pdf = PDF::loadview('backend.employee.employee_registration.employee_details_pdf', $data);
        // $pdf->SetProtection(['copy','print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
    
    
    











}
