<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section['section'] = Section::get();
        return view('admin.section.section_manage', $section);
    }

    
    public function store(Request $request)
    {
          $request->validate([
                'section' => ['required']
          ]);

          $section = new Section();

          $section->section = $request->section;
          $section->status = $request->status == true ? "Publish" : "Hidden";

          $section->save();

          toastr()
          ->timeout(2000)
          ->closeButton(true)
          ->success('Section data added successfully.');

          return redirect()->back();
    }

    public function edith($slug)
    {
          $section_data ['section_data'] = Section::where('slug', $slug)->get()->first();
         return view('admin.section.edith_section',$section_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $section = Section::find($id);

         $section->section = $request->section;
         $section->status = $request->status == true ? "Publish" : "Hidden";

         $section->update();

         toastr()
         ->timeout(2000)
         ->closeButton(true)
         ->success('Section data updated successfully.');

         return redirect()->route('admin.sectionAdd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $delete_section = Section::find($id);
         $delete_section->delete();

         toastr()
         ->timeout(2000)
         ->closeButton(true)
         ->success('Section data deleted successfully.');

         return redirect()->back();
    }
}
