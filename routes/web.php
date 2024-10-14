<?php

use App\Http\Controllers\AcedamicyearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasssController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Acedamicyear;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'student'])->group(function(){
    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('logout', [StudentController::class, 'logout']);
});


Route::middleware(['guest', 'student.guest'])->group(function(){
    Route::get('student/login', [StudentController::class, 'student_login'])->name('student.login');
    Route::post('student/login/authenticate', [StudentController::class, 'authenticate'])->name('studentLogin');

});

       
       
    




Route::group(['prefix'=> 'admin'], function(){

     Route::group(['middleware' => 'admin.guest'], function(){

        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('adminLogin');
        Route::get('register', [AdminController::class, 'registerForm'])->name('admin.register');
        Route::post('register', [AdminController::class, 'register'])->name('adminRegister');
        
     });

     Route::group(['middleware' => 'admin.auth'], function(){

        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('acedamicyear/index/create', [AcedamicyearController::class, 'index'])->name('admin.acedamic_year');
        Route::post('acedamicyear/index/store', [AcedamicyearController::class, 'store'])->name('admin.acedamic.store');
        Route::get('acedamicyear/index/read', [AcedamicyearController::class, 'read'])->name('admin.viewAcedamic_year');
        Route::get('acedamicyear/index/delete/{id}', [AcedamicyearController::class, 'delete'])->name('admin.acedamicYear_delete');
        Route::get('acedamicyear/index/edtih/{id}', [AcedamicyearController::class, 'edith'])->name('admin.acedamicYear_edith');
        Route::put('acedamicyear/index/update/{id}', [AcedamicyearController::class, 'Update'])->name('admin.acedamic_yearUpdate');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');


        Route::get('section/index/create', [SectionController::class, 'index'])->name('admin.sectionAdd');
        Route::post('section/index/store', [SectionController::class, 'store'])->name('admin.sectionCreate');
        Route::get('section/index/edith/{slug}', [SectionController::class, 'edith'])->name('admin.section_edith');
        Route::put('section/index/update/{id}', [SectionController::class, 'update'])->name('admin.section_update');
        Route::get('section/index/delete/{id}', [SectionController::class, 'destroy'])->name('admin.section_delete');


        Route::get('class/index/manage', [ClasssController::class, 'index'])->name('admin.classManage');
        Route::post('class/index/create', [ClasssController::class, 'store'])->name('admin.classCreate');
        Route::get('class/index/edith/{slug}', [ClasssController::class, 'edith'])->name('admin.class_edith');
        Route::put('class/index/update/{id}', [ClasssController::class, 'update'])->name('admin.classUpdate');
        Route::get('class/index/delete/{id}', [ClasssController::class, 'destroy'])->name('admin.class_delete');


        Route::get('class/index/feeHead/create', [FeeHeadController::class, 'index'])->name('admin.addFeeHeaad');
        Route::post('class/index/feeHead/store', [FeeHeadController::class, 'store'])->name('admin.feehead.store');
        Route::get('class/index/feeHead/read', [FeeHeadController::class, 'read'])->name('admin.viewFeehead');
        Route::get('class/index/feeHead/edith/{slug}', [FeeHeadController::class, 'edith'])->name('admin.fee.edith');
        Route::put('class/index/feeHead/update/{id}', [FeeHeadController::class, 'update'])->name('admin.feehead.update');
        Route::get('class/index/feeHead/delete/{id}', [FeeHeadController::class, 'destroy'])->name('admin.fee_delete');


        Route::get('fee_steucture/index/fee/create', [FeeStructureController::class, 'index'])->name('admin.feeStructure_Create');
        Route::post('fee_steucture/index/fee/store', [FeeStructureController::class, 'store'])->name('admin.feeStructure.store');
        Route::get('fee_steucture/index/fee/read', [FeeStructureController::class, 'read'])->name('admin.feeStructure_Read');
        Route::get('fee_steucture/index/fee/delete/{id}', [FeeStructureController::class, 'destroy'])->name('admin.feeStructure_delete');
        Route::get('fee_steucture/index/fee/edith/{id}', [FeeStructureController::class, 'edith'])->name('admin.feeStructure_edith');
        Route::put('fee_steucture/index/fee/update/{id}', [FeeStructureController::class, 'update'])->name('admin.feeStructure.update');


        Route::get('courses/index/course/manage', [CourseController::class, 'index'])->name('admin.manageCourse');
        Route::post('courses/index/course/store', [CourseController::class, 'store'])->name('admin.courseCreate');
        Route::get('courses/index/course/edith/{id}', [CourseController::class, 'edith'])->name('admin.course_edith');
        Route::put('courses/index/course/update/{id}', [CourseController::class, 'update'])->name('admin.courseUpdate');
        Route::get('courses/index/course/delete/{id}', [CourseController::class, 'destroy'])->name('admin.course_delete');


        Route::get('subject/index/subject/manage', [SubjectController::class, 'index'])->name('admin.subjectManage');
        Route::post('subject/index/subject/store', [SubjectController::class, 'store'])->name('admin.subjectCreate');
        Route::get('subject/index/subject/edith/{id}', [SubjectController::class, 'edith'])->name('admin.subject_edith');
        Route::put('subject/index/subject/update/{id}', [SubjectController::class, 'update'])->name('admin.subjectUpdate');
        Route::get('subject/index/subject/delete/{id}', [SubjectController::class, 'destroy'])->name('admin.subject_delete');


        Route::get('manage_parent/index/manage', [ManageuserController::class, 'manage_parent'])->name('admin.manageParent');
        Route::get('manage_parent/index/create', [ManageuserController::class, 'createParent'])->name('admin.addParent');
        Route::post('manage_parent/index/store', [ManageuserController::class, 'store'])->name('admin.addParent.store');
        Route::get('manage_parent/index/edith/{id}', [ManageuserController::class, 'edith'])->name('admin.parent_edith');
        Route::put('manage_parent/index/update/{id}', [ManageuserController::class, 'update'])->name('admin.updateParent.update');
        Route::get('manage_parent/index/create/child/{id}', [ManageuserController::class, 'createChild'])->name('admin.parentStudent_register');
        Route::post('manage_parent/index/store/child', [ManageuserController::class, 'storeChild'])->name('admin.addStudent.store');
        Route::get('manage_student/index/manage', [ManageuserController::class, 'index_student'])->name('admin.student.manage');
        Route::get('manage_student/index/edith/{id}', [ManageuserController::class, 'edith_student'])->name('admin.student_edith');
        Route::put('manage_student/index/update/{id}', [ManageuserController::class, 'update_student'])->name('admin.updateStudent.update');
        Route::get('manage_student/index/delete/{id}', [ManageuserController::class, 'delete_student'])->name('admin.student_delete');

     });

});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
