<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course['course_data'] = Course::all();
        return view('admin.course.manage_course',$course);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_title' => ['required']
      ]);

      $course = new Course();

      $course->course_title = $request->course_title;
      $course->status = $request->status == true ? "Publish" : "Hidden";

      $course->save();

      toastr()
      ->timeout(2000)
      ->closeButton(true)
      ->success('Course data added successfully.');

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith($id)
    {
        $data['course_data'] = Course::find($id);
        return view('admin.course.update_course',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course_data = Course::find($id);

        $course_data->course_title = $request->course_title;
        $course_data->status = $request->status == true ? "Publish" : "Hidden";

      $course_data->update();

      toastr()
      ->timeout(2000)
      ->closeButton(true)
      ->success('Course data updated successfully.');

      return redirect()->route('admin.manageCourse');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course_delete = Course::find($id);
        $course_delete->delete();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Course data deleted successfully.');
  
        return redirect()->route('admin.manageCourse');
    }
}
