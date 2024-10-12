<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\Section;
use Illuminate\Http\Request;

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section['section_data'] = Section::where('status', 'Publish')->get();
        $class['class_data'] = Classs::get();
         return view('admin.class.classmanage',$section,$class);
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
            'class_title' => ['required'],
            'section_id' => ['required']
        ]);

        $class_data = new Classs();

        $class_data->class_title = $request->class_title;
        $class_data->section_id = implode(',', $request->section_id);
        $class_data->status = $request->status == true ? "Publish" : "Hidden";

        $class_data->save();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Class data added successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Classs $classs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith($slug)
    {
        $section['section_data'] = Section::get();
        $class['class_data'] = Classs::where('slug', $slug)->get()->first();
        return view('admin.class.class_edith', $class, $section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_id' => ['required'],
        ]);

        $update_class = Classs::find($id);

        $update_class->class_title = $request->class_title;
        $update_class->section_id = implode(',', $request->section_id);
        $update_class->status = $request->status == true ? "Publish" : "Hidden";

        $update_class->update();

         toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Class data updated successfully.');

        return redirect()->route('admin.classManage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
          $class = Classs::find($id);
          $class->delete();

          toastr()
          ->timeout(2000)
          ->closeButton(true)
          ->success('Class data deleted successfully.');
  
          return redirect()->back();
    }
}
