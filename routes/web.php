<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\Account\OtherCostController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Report\AttendanceReportController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Report\ResultReportController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'],function(){ //PREVENT BACK BUTTON AFTER LOGOUT
 

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');
    });

    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');


    Route::group(['middleware' => 'auth'],function(){ //THIS LINE IS TO REDIRECT NON LOGGED IN USERS TO THE LOGIN PAGE

        // USER MANAGEMENT ROUTES

        Route::prefix('users')->group(function(){ // Grouping your routes

            Route::get('/view',[UserController::class,'userView'])->name('user.view');
            
            Route::get('/add',[UserController::class,'userAdd'])->name('users.add');

            Route::post('/store',[UserController::class,'userStore'])->name('users.store');

            Route::get('/edit/{id}',[UserController::class,'userEdit'])->name('users.edit');

            Route::post('/update/{id}',[UserController::class,'userUpdate'])->name('users.update');

            Route::get('/delete/{id}',[UserController::class,'userDelete'])->name('users.delete');

        }); //END OF PREFIX



        // USER PROFILE AND PASSWORD ROUTES

        Route::prefix('profile')->group(function(){ // Grouping your routes

            Route::get('/view',[ProfileController::class,'profileView'])->name('profile.view');

            Route::get('/edit',[ProfileController::class,'profileEdit'])->name('profile.edit');

            Route::post('/store',[ProfileController::class,'profileStore'])->name('profile.store');

            Route::get('/password/view',[ProfileController::class,'passwordView'])->name('password.view');

            Route::post('/password/update',[ProfileController::class,'passwordUpdate'])->name('password.update');
            
        }); //END OF PREFIX


        // SETUP ROUTES
        Route::prefix('setups')->group(function(){ // Grouping your routes

            Route::get('/student/class/view',[StudentClassController::class,'viewStudent'])->name('student.class.view');

            Route::get('/student/class/add',[StudentClassController::class,'studentClassAdd'])->name('student.class.add');

            Route::post('/student/class/store',[StudentClassController::class,'studentClassStore'])->name('store.student.class');

            Route::get('/student/class/edit/{id}',[StudentClassController::class,'studentClassEdit'])->name('student.class.edit');

            Route::post('/student/class/update/{id}',[StudentClassController::class,'studentClassUpdate'])->name('update.student.class');

            Route::get('/student/class/delete/{id}',[StudentClassController::class,'studentClassDelete'])->name('student.class.delete');


            //STUDENT YEAR ROUTES
            Route::get('/student/year/view',[StudentYearController::class,'viewYear'])->name('student.year.view');

            Route::get('/student/year/add',[StudentYearController::class,'studentYearAdd'])->name('student.year.add');

            Route::post('/student/year/store',[StudentYearController::class,'studentYearStore'])->name('store.student.year');

            Route::get('/student/year/edit/{id}',[StudentYearController::class,'studentYearEdit'])->name('student.year.edit');

            Route::post('/student/year/update/{id}',[StudentYearController::class,'studentYearUpdate'])->name('update.student.year');

            Route::get('/student/year/delete/{id}',[StudentYearController::class,'studentYearDelete'])->name('student.year.delete');



            //STUDENT GROUP ROUTES
            Route::get('/student/group/view',[StudentGroupController::class,'viewGroup'])->name('student.group.view');

            Route::get('/student/group/add',[StudentGroupController::class,'studentGroupAdd'])->name('student.group.add');

            Route::post('/student/group/store',[StudentGroupController::class,'studentGroupStore'])->name('store.student.group');

            Route::get('/student/group/edit/{id}',[StudentGroupController::class,'studentGroupEdit'])->name('student.group.edit');

            Route::post('/student/group/update/{id}',[StudentGroupController::class,'studentGroupUpdate'])->name('update.student.group');

            Route::get('/student/group/delete/{id}',[StudentGroupController::class,'studentGroupDelete'])->name('student.group.delete');



            //STUDENT SHIFT ROUTES
            Route::get('/student/shift/view',[StudentShiftController::class,'viewShift'])->name('student.shift.view');

            Route::get('/student/shift/add',[StudentShiftController::class,'studentShiftAdd'])->name('student.shift.add');

            Route::post('/student/shift/store',[StudentShiftController::class,'studentShiftStore'])->name('store.student.shift');

            Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'studentShiftEdit'])->name('student.shift.edit');

            Route::post('/student/shift/update/{id}',[StudentShiftController::class,'studentShiftUpdate'])->name('update.student.shift');

            Route::get('/student/shift/delete/{id}',[StudentShiftController::class,'studentShiftDelete'])->name('student.shift.delete');



            // FEE CATEGORY ROUTES
            Route::get('/fee/category/view',[FeeCategoryController::class,'viewFeeCat'])->name('fee.category.view');

            Route::get('/fee/category/add',[FeeCategoryController::class,'feeCatAdd'])->name('fee.category.add');

            Route::post('/fee/category/store',[FeeCategoryController::class,'feeCatStore'])->name('store.fee.category');

            Route::get('/fee/category/edit/{id}',[FeeCategoryController::class,'feeCatEdit'])->name('fee.category.edit');

            Route::post('/fee/cat/update/{id}',[FeeCategoryController::class,'feeCatUpdate'])->name('update.fee.cat');

            Route::get('/fee/category/delete/{id}',[FeeCategoryController::class,'feeCatDelete'])->name('fee.category.delete');



            // FEE CATEGORY AMOUNT ROUTES
            Route::get('/fee/amount/view',[FeeAmountController::class,'viewFeeAmount'])->name('fee.amount.view');

            Route::get('/fee/amount/add',[FeeAmountController::class,'addFeeAmount'])->name('fee.amount.add');
            
            Route::post('/fee/amount/store',[FeeAmountController::class,'storeFeeAmount'])->name('store.fee.amount');

            Route::get('/fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'editFeeAmount'])->name('fee.amount.edit');

            Route::post('/fee/amount/update/{fee_category_id}',[FeeAmountController::class,'updateFeeAmount'])->name('update.fee.amount');

            Route::get('/fee/amount/details/{fee_category_id}',[FeeAmountController::class,'detailsFeeAmount'])->name('fee.amount.details');

            // Route::get('/fee/amount/delete/{fee_category_id}',[FeeAmountController::class,'deleteFeeAmount'])->name('fee.amount.delete');



            // EXAM TYPE ROUTES
            Route::get('/exam/type/view',[ExamTypeController::class,'viewExamType'])->name('exam.type.view');

            Route::get('/exam/type/add',[ExamTypeController::class,'examTypeAdd'])->name('exam.type.add');

            Route::post('/exam/type/store',[ExamTypeController::class,'examTypeStore'])->name('store.exam.type');

            Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'examTypeEdit'])->name('exam.type.edit');

            Route::post('/exam/type/update/{id}',[ExamTypeController::class,'examTypeUpdate'])->name('update.exam.type');

            Route::get('/exam/type/delete/{id}',[ExamTypeController::class,'examTypeDelete'])->name('exam.type.delete');




            // SCHOOL SUBJECT ROUTES
            Route::get('/school/subject/view',[SchoolSubjectController::class,'viewSubject'])->name('school.subject.view');

            Route::get('/school/subject/add',[SchoolSubjectController::class,'SubjectAdd'])->name('school.subject.add');

            Route::post('/school/subject/store',[SchoolSubjectController::class,'subjectStore'])->name('store.school.subject');

            Route::get('/school/subject/edit/{id}',[SchoolSubjectController::class,'subjectEdit'])->name('school.subject.edit');

            Route::post('/school/subject/update/{id}',[SchoolSubjectController::class,'subjectUpdate'])->name('update.school.subject');

            Route::get('/school/subject/delete/{id}',[SchoolSubjectController::class,'subjectDelete'])->name('school.subject.delete');



            // ASSIGN SUBJECT ROUTES
            Route::get('/assign/subject/view',[AssignSubjectController::class,'viewAssignSubject'])->name('assign.subject.view');

            Route::get('/assign/subject/add',[AssignSubjectController::class,'addAssignSubject'])->name('assign.subject.add');
            
            Route::post('/assign/subject/store',[AssignSubjectController::class,'storeAssignSubject'])->name('store.assign.subject');

            Route::get('/assign/subject/edit/{class_id}',[AssignSubjectController::class,'editAssignSubject'])->name('assign.subject.edit');

            Route::post('/assign/subject/update/{class_id}',[AssignSubjectController::class,'updateAssignSubject'])->name('update.assign.subject');

            Route::get('/assign/subject/details/{class_id}',[AssignSubjectController::class,'detailsAssignSubject'])->name('assign.subject.details');

            
            // DESIGNATION ROUTES
            Route::get('/designation/view',[DesignationController::class,'viewDesignation'])->name('designation.view');

            Route::get('/designation/add',[DesignationController::class,'designationAdd'])->name('designation.add');

            Route::post('/designation/store',[DesignationController::class,'designationStore'])->name('store.designation');

            Route::get('/designation/edit/{id}',[DesignationController::class,'designationEdit'])->name('designation.edit');

            Route::post('/designation/update/{id}',[DesignationController::class,'designationUpdate'])->name('update.designation');

            Route::get('/designation/delete/{id}',[DesignationController::class,'designationDelete'])->name('designation.delete');



            
        }); //END OF PREFIX


        ///STUDENT REGISTRATION ROUTES

        Route::prefix('students')->group(function(){ // Grouping your routes

            Route::get('/reg/view',[StudentRegistrationController::class,'StudentRegistrationView'])->name('student.registration.view');

            Route::get('/registration/add',[StudentRegistrationController::class,'studentRegistrationAdd'])->name('student.registration.add');

            Route::post('/registration/store',[StudentRegistrationController::class,'studentRegistrationStore'])->name('store.student.registration');

            Route::get('/year/class/wise',[StudentRegistrationController::class,'studentYearClassWiseSearch'])->name('student.year.class.wise');

            Route::get('/registration/edit/{student_id}',[StudentRegistrationController::class,'studentRegistrationEdit'])->name('student.registration.edit');

            Route::post('/registration/update/{student_id}',[StudentRegistrationController::class,'studentRegistrationUpdate'])->name('update.student.registration');

            Route::get('/registration/promotion/{student_id}',[StudentRegistrationController::class,'studentRegistrationPromotion'])->name('student.registration.promotion');

            Route::post('/registration/update/promotion/{student_id}',[StudentRegistrationController::class,'studentUpdatePromotion'])->name('promotion.student.registration');

            Route::get('/registration/update/details/{student_id}',[StudentRegistrationController::class,'studentRegistrationDetails'])->name('student.registration.details');



            // STUDENT ROLL GENERATE ROUTES
            Route::get('/roll/generate/view',[StudentRollController::class,'StudentRollView'])->name('roll.generate.view');

            Route::get('/reg/getstudents/view',[StudentRollController::class,'getStudents'])->name('student.registration.getstudents');

            Route::post('/roll/generate/store',[StudentRollController::class,'studentRollStore'])->name('roll.generate.store');



            
            // REGISTRATION FEE ROUTES
            Route::get('/reg/fee/view',[RegistrationFeeController::class,'regFeeView'])->name('registration.fee.view');

            Route::get('/reg/fee/classwisedata',[RegistrationFeeController::class,'regFeeClassData'])->name('student.registration.fee.classwise.get');

            Route::get('/reg/fee/payslip',[RegistrationFeeController::class,'regFeePayslip'])->name('student.registration.fee.payslip');


            // MONTHLY FEE ROUTES
            Route::get('/monthly/fee/view',[MonthlyFeeController::class,'monthlyFeeView'])->name('monthly.fee.view');

            Route::get('/monthly/fee/classwisedata',[MonthlyFeeController::class,'monthlyFeeClassData'])->name('student.monthly.fee.classwise.get');

            Route::get('/monthly/fee/payslip',[MonthlyFeeController::class,'monthlyFeePayslip'])->name('student.monthly.fee.payslip');
            
            
            // EXAM FEE ROUTES
            Route::get('/exam/fee/view',[ExamFeeController::class,'examFeeView'])->name('exam.fee.view');

            Route::get('/exam/fee/classwisedata',[ExamFeeController::class,'examFeeClassData'])->name('student.exam.fee.classwise.get');

            Route::get('/exam/fee/payslip',[ExamFeeController::class,'examFeePayslip'])->name('student.exam.fee.payslip');


        }); //END OF PREFIX


        // EMPLOYEE REGISTRATION ROUTES

        Route::prefix('employees')->group(function(){ // Grouping your routes

            Route::get('reg/employee/view',[EmployeeRegistrationController::class,'employeeView'])->name('employee.registration.view');

            Route::get('reg/employee/add',[EmployeeRegistrationController::class,'employeeAdd'])->name('employee.registration.add');

            Route::post('reg/employee/store',[EmployeeRegistrationController::class,'employeeStore'])->name('store.employee.registration');

            Route::get('reg/employee/edit/{id}',[EmployeeRegistrationController::class,'employeeEdit'])->name('employee.registration.edit');

            Route::post('reg/employee/update/{id}',[EmployeeRegistrationController::class,'employeeUpdate'])->name('update.employee.registration');

            Route::get('reg/employee/details/{id}',[EmployeeRegistrationController::class,'employeeDetails'])->name('employee.registration.details');

            


            // EMPLOYEE SALARY ROUTES
            Route::get('salary/employee/view',[EmployeeSalaryController::class,'salaryView'])->name('employee.salary.view');

            Route::get('salary/employee/increment/{id}',[EmployeeSalaryController::class,'salaryIncrement'])->name('employee.salary.increment');

            Route::post('salary/employee/store/{id}',[EmployeeSalaryController::class,'salaryStore'])->name('update.increment.store');

            Route::get('salary/employee/details/{id}',[EmployeeSalaryController::class,'salaryDetails'])->name('employee.salary.details');


            // EMPLOYEE LEAVE ROUTES
            Route::get('leave/employee/view',[EmployeeLeaveController::class,'leaveView'])->name('employee.leave.view');

            Route::get('leave/employee/add',[EmployeeLeaveController::class,'leaveAdd'])->name('employee.leave.add');

            Route::post('leave/employee/store',[EmployeeLeaveController::class,'leaveStore'])->name('store.employee.leave');

            Route::get('leave/employee/edit/{id}',[EmployeeLeaveController::class,'leaveEdit'])->name('employee.leave.edit');

            Route::post('leave/employee/update/{id}',[EmployeeLeaveController::class,'leaveUpdate'])->name('update.employee.leave');

            Route::get('leave/employee/delete/{id}',[EmployeeLeaveController::class,'leaveDelete'])->name('employee.leave.delete');

            
            // EMPLOYEE ATTENDANCE ROUTES
            Route::get('attendance/employee/view',[EmployeeAttendanceController::class,'attendanceView'])->name('employee.attendance.view');

            Route::get('attendance/employee/add',[EmployeeAttendanceController::class,'attendanceAdd'])->name('employee.attendance.add');

            Route::post('attendance/employee/store',[EmployeeAttendanceController::class,'attendanceStore'])->name('store.employee.attendance');

            Route::get('attendance/employee/edit/{date}',[EmployeeAttendanceController::class,'attendanceEdit'])->name('employee.attendance.edit');

            Route::get('attendance/employee/details/{date}',[EmployeeAttendanceController::class,'attendanceDetails'])->name('employee.attendance.details');


            // EMPLOYEE MONTHLY SALARY ROUTES
            Route::get('monthly/salary/view',[MonthlySalaryController::class,'monthlySalaryView'])->name('employee.monthly.salary');

            Route::get('monthly/salary/get',[MonthlySalaryController::class,'monthlySalaryGet'])->name('employee.monthly.salary.get');

            Route::get('monthly/salary/payslip/{employee_id}',[MonthlySalaryController::class,'monthlySalaryPayslip'])->name('employee.monthly.salary.payslip');

            
        });//END OF PREFIX



        // MARKS MANAGEMENT ROUTES

        Route::prefix('marks')->group(function(){ // Grouping your routes

            Route::get('marks/entry/add',[MarksController::class,'marksAdd'])->name('marks.entry.add');

            Route::post('marks/entry/store',[MarksController::class,'marksStore'])->name('marks.entry.store');

            Route::get('marks/entry/edit',[MarksController::class,'marksEdit'])->name('marks.entry.edit');

            Route::get('marks/getstudents/edit',[MarksController::class,'marksEditGetstudents'])->name('student.edit.getstudents');

            Route::post('marks/entry/update',[MarksController::class,'marksUpdate'])->name('marks.entry.update');


            //MARKS ENTRY GRADE
            Route::get('marks/grade/view',[GradeController::class,'marksGradeView'])->name('marks.entry.grade');

            Route::get('marks/grade/add',[GradeController::class,'marksGradeAdd'])->name('marks.grade.add');

            Route::post('marks/grade/store',[GradeController::class,'marksGradeStore'])->name('store.marks.grade');

            Route::get('marks/grade/edit/{id}',[GradeController::class,'marksGradeEdit'])->name('marks.grade.edit');

            Route::post('marks/grade/update/{id}',[GradeController::class,'marksGradeUpdate'])->name('update.marks.grade');

            Route::get('marks/grade/delete/{id}',[GradeController::class,'marksGradeDelete'])->name('marks.grade.delete');



            
            
        }); //END OF PREFIX



        ////THESE ROUTES WARE CREATED FOR DEFAULT MARKS FOR JSON
        Route::get('marks/getsubject',[DefaultController::class,'getSubject'])->name('marks.getsubject');

        Route::get('student/marks/getstudents',[DefaultController::class,'getStudents'])->name('student.marks.getstudents');
        



        // ACCOUNTS MANAGEMENT ROUTES

        Route::prefix('account')->group(function(){ // Grouping your routes

            Route::get('student/fee/view',[StudentFeeController::class,'studentFeeView'])->name('student.fee.view');

            Route::get('student/fee/add',[StudentFeeController::class,'studentFeeAdd'])->name('student.fee.add');

            Route::get('account/fee/getstudent',[StudentFeeController::class,'studentFeeGetStudent'])->name('account.fee.getstudent');

            Route::post('account/fee/store',[StudentFeeController::class,'studentFeeStore'])->name('account.fee.store');

            
            //EMPLOYEE SALARY ROUTE
            Route::get('account/salary/view',[AccountSalaryController::class,'accountSalaryView'])->name('account.salary.view');

            Route::get('account/salary/add',[AccountSalaryController::class,'accountSalaryAdd'])->name('account.salary.add');

            Route::get('account/salary/getemployee',[AccountSalaryController::class,'accountSalaryGetEmployee'])->name('account.salary.getemployee');

            Route::post('account/salary/store',[AccountSalaryController::class,'accountSalaryStore'])->name('account.salary.store');


            //OTHER COST ROUTES
            Route::get('other/cost/view',[OtherCostController::class,'otherCostView'])->name('other.cost.view');

            Route::get('other/cost/add',[OtherCostController::class,'otherCostAdd'])->name('other.cost.add');

            Route::post('other/cost/store',[OtherCostController::class,'otherCostStore'])->name('store.other.cost');

            Route::get('other/cost/edit/{id}',[OtherCostController::class,'otherCostEdit'])->name('edit.other.cost');

            Route::post('other/cost/update/{id}',[OtherCostController::class,'otherCostUpdate'])->name('update.other.cost');

            
        }); //END OF PREFIX


            // REPORTS Interface ROUTES

        Route::prefix('reports')->group(function(){ // Grouping your routes

            Route::get('monthly/profit/view',[ProfitController::class,'monthlyProfitView'])->name('monthly.profit.view');

            Route::get('monthly/profit/datewise',[ProfitController::class,'monthlyProfitDatewise'])->name('report.profit.datewise.get');

            Route::get('monthly/profit/pdf',[ProfitController::class,'monthlyProfitPdf'])->name('report.profit.pdf');



            //MARKSHEET GENERATE ROUTES
            Route::get('marksheet/generate/view',[MarkSheetController::class,'markSheetView'])->name('marksheet.generate.view');

            Route::get('marksheet/generate/get',[MarkSheetController::class,'markSheetGet'])->name('report.marksheet.get');



            //ATTENDANCE REPORT ROUTES
            Route::get('attendance/report/view',[AttendanceReportController::class,'attendReportView'])->name('attendance.report.view');

            Route::get('attendance/report/get',[AttendanceReportController::class,'attendReportGet'])->name('report.attendance.get');

            

            //STUDENT RESULT REPORT ROUTES
            Route::get('student/result/view',[ResultReportController::class,'resultView'])->name('student.result.view');

            Route::get('student/result/get',[ResultReportController::class,'resultGet'])->name('report.student.result.get');


            //STUDENT ID CARD ROUTES
            Route::get('student/idcard/view',[ResultReportController::class,'idcardView'])->name('student.idcard.view');

            Route::get('student/idcard/get',[ResultReportController::class,'idcardGet'])->name('report.student.idcard.get');


                
            }); //END OF PREFIX





        
    }); //END MIDDLEWARE AUTH ROUTE FOR NON LOGGED IN USERS REDIRECTING 

}); //PREVENT BACK BUTTON MIDDLEWARE AFTER LOGOUT

// GOT TO  https://www.w3adda.com/blog/laravel-prevent-browser-back-button-after-logout  TO LEARN HOW TO PREVENT BACK BUTTON