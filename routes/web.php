<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
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
    });



    // USER PROFILE AND PASSWORD ROUTES

    Route::prefix('profile')->group(function(){ // Grouping your routes

        Route::get('/view',[ProfileController::class,'profileView'])->name('profile.view');

        Route::get('/edit',[ProfileController::class,'profileEdit'])->name('profile.edit');

        Route::post('/store',[ProfileController::class,'profileStore'])->name('profile.store');

        Route::get('/password/view',[ProfileController::class,'passwordView'])->name('password.view');

        Route::post('/password/update',[ProfileController::class,'passwordUpdate'])->name('password.update');
        
    });


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



        
    });


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
        
    


    });






    
}); //END MIDDLEWARE AUTH ROUTE FOR NON LOGGED IN USERS REDIRECTING 