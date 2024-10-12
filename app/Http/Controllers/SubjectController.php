<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['course_data'] = Course::all();
        $data['subject_data'] = Subject::with(['course'])->latest()->get();
        return view('admin.subject.manageSubject',$data);
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
            'subject_title' => ['required']
        ]);

        $subject = new Subject();
        $subject->subject_title = $request->subject_title;
        $subject->course_id = $request->course_id;
        $subject->status = $request->status == true ? "Publish" : "Hidden";

        $subject->save();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Subject data added successfully.');
  
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith($id)
    {
        $data['subject_data'] = Subject::find($id);
        $data['course_data'] = Course::all();

        return view('admin.subject.updateSubject',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update_subject = Subject::find($id);

        $update_subject->subject_title = $request->subject_title;
        $update_subject->course_id = $request->course_id;
        $update_subject->status = $request->status == true ? "Publish" : "Hidden";

        $update_subject->update();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Subject data updated successfully.');
  
        return redirect()->route('admin.subjectManage');

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete_subject = Subject::find($id);
        $delete_subject->delete();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Subject data deleted successfully.');
  
        return redirect()->back();
    }
}
