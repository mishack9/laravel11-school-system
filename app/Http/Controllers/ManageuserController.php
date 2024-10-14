<?php

namespace App\Http\Controllers;

use App\Models\Acedamicyear;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageuserController extends Controller
{
    public function manage_parent()
    {
        $data['parent_data'] = User::where('role', 'parent')->get();
        return view('admin.user.manage_parent',$data);
    }


    public function createParent()
    {
        return view('admin.user.create_parent');
    }


    public function store(Request $request)
    {
          $request->validate([
               'name' => ['required'],
               'email' => ['required', 'email', 'unique:users'],
               'password' => ['required'],
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->role = "parent";
          $user->lastname = $request->lastname;
          $user->country = $request->country;
          $user->state = $request->state;
          $user->phone_number = $request->phone_number;
          $user->address = $request->address;
          $user->mother_firstname = $request->mother_firstname;
          $user->mother_lastname = $request->mother_lastname;
          $user->password = Hash::make($request->password);

          $user->save();

          toastr()
          ->timeout(2000)
          ->closeButton(true)
          ->success('Parent data Added Successfully......');
   
          return redirect()->route('admin.manageParent');
    }


    public function edith($id)
    {
        $data['parent_data'] = User::find($id);
        return view('admin.user.update_parent',$data);
    }


    public function update(Request $request, $id)
    {
        $parent_data = User::find($id);

          $parent_data->name = $request->name;
          $parent_data->email = $request->email;
          $parent_data->lastname = $request->lastname;
          $parent_data->country = $request->country;
          $parent_data->state = $request->state;
          $parent_data->phone_number = $request->phone_number;
          $parent_data->address = $request->address;
          $parent_data->mother_firstname = $request->mother_firstname;
          $parent_data->mother_lastname = $request->mother_lastname;

          $parent_data->update();

          toastr()
          ->timeout(2000)
          ->closeButton(true)
          ->success('Parent data updated successfully......');
   
          return redirect()->route('admin.manageParent');
    }


    public function createChild($id)
    {
        $data['acedamic_data'] = Acedamicyear::all();
        $data['class_data'] = Classs::all();
        $data['course_data'] = Course::all();
        $data['section_data'] = Section::all();
        $data['parent_data'] = User::find($id);
        return view('admin.user.createChild',$data);
    }

    public function storeChild(Request $request)
    {
        $request->validate([
            's_firstname' =>['required'],
            's_middlename' =>['required'],
            's_lastname' =>['required'],
            's_email' =>['required', 'email', 'unique:students'],
            's_dob' =>['required'],
            'gender' =>['required'],
            'image' =>['required'],
            'acedamic_year_id' =>['required'],
            'class_id' =>['required'],
            'course_id' =>['required'],
            'section_id' => ['required'],
            'password' =>['required'],
            'admission_date' =>['required'],
            
        ]);

            $student_add = new Student();

            $student_add->parent_id = $request->parent_id;
            $student_add->s_firstname = $request->s_firstname;
            $student_add->s_middlename = $request->s_middlename;
            $student_add->s_lastname = $request->s_lastname;
            $student_add->s_email = $request->s_email;
            $student_add->dob = $request->s_dob;
            $student_add->gender = $request->gender;
              $image = $request->image;
              if($image)
              {
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('student_image',$image_name);
                $student_add->image = $image_name;
              }
            $student_add->acedamic_year_id = $request->acedamic_year_id;
            $student_add->class_id = $request->class_id;
            $student_add->course_id = $request->course_id;
            $student_add->section_id = $request->section_id;
            $student_add->password = Hash::make($request->password);
            $student_add->admission_number = rand(00000,99999);
            $student_add->status = $request->status == true ? 'Publish' : 'Hidden';

            $student_add->save();

            toastr()
          ->timeout(2000)
          ->closeButton(true)
          ->success('Student registration successfully....');
   
          return redirect()->back();

    }


    public function index_student(Request $request)
    {
        $query = Student::with(['parent', 'class', 'course', 'acedamic_year', 'Section'])->latest();
         /* dd($data); */
         if($request->filled('section_id'))
         {
            $query->where('section_id', $request->get('section_id'));
         }
         if($request->filled('class_id'))
         {
            $query->where('class_id', $request->get('class_id'));
         }
         if($request->filled('acedamic_year_id'))
         {
            $query->where('acedamic_year_id', $request->get('acedamic_year_id'));
         }
         if($request->filled('course_id'))
         {
            $query->where('course_id', $request->get('course_id'));
         }
        $data['student_data'] = $query->get();
        $data['acedamic_data'] = Acedamicyear::all();
        $data['section_data'] = Section::all();
        $data['class_data'] = Classs::all();
        $data['course_data'] = Course::all();
        return view('admin.user.manage_student',$data);

    }


    public function edith_student($id)
    {
        $data['acedamic_data'] = Acedamicyear::all();
        $data['class_data'] = Classs::all();
        $data['course_data'] = Course::all();
        $data['section_data'] = Section::all();
        $data['student_data'] = Student::find($id);
        return view('admin.user.update_student',$data);
    }


    public function update_student(Request $request, $id)
    {
         
        $student_update = Student::find($id);

        $student_update->parent_id = $request->parent_id;
        $student_update->s_firstname = $request->s_firstname;
        $student_update->s_middlename = $request->s_middlename;
        $student_update->s_lastname = $request->s_lastname;
        $student_update->s_email = $request->s_email;
        $student_update->dob = $request->dob;
        $student_update->gender = $request->gender;
          $image = $request->image;
          if($image)
          {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('student_image'.$image_name);
            $student_update->image = $image_name;
          }
        $student_update->acedamic_year_id = $request->acedamic_year_id;
        $student_update->class_id = $request->class_id;
        $student_update->course_id = $request->course_id;
        $student_update->section_id = $request->section_id;
        $student_update->status = $request->status == true ? 'Publish' : 'Hidden';

        $student_update->update();

        toastr()
      ->timeout(2000)
      ->closeButton(true)
      ->success('Student registration data updated successfully....');

      return redirect()->route('admin.student.manage');
    }


    public function delete_student($id)
    {
        $student_delete = Student::find($id);

                 $image_path = public_path('student_image/'.$student_delete->image);
                 if(file_exists($image_path))
                 {
                  unlink($image_path);
                 }

        $student_delete->delete();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Student data deleted successfully....');
 
        return redirect()->back();
    }
}
