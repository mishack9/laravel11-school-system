<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.feehead.addfee_head");
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
            'fee_title' => ['required']
         ]);

         $fee = new FeeHead();
         $fee->fee_title = $request->fee_title;
         $fee->status = $request->status == true ? 'Publish' : 'Hidden';

         $fee->save();

         toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Fee data added successfully.');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function read()
    {
         $fee_data['fee_data'] = FeeHead::get();
         return view('admin.feehead.view_feehead', $fee_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith($slug)
    {
        $fee_head['fee_data'] = FeeHead::where('slug',$slug)->get()->first();
        return view('admin.feehead.update_feehead',$fee_head);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fee_data_head = FeeHead::find($id);

        $fee_data_head->fee_title = $request->fee_title;
        $fee_data_head->status = $request->status == true ? 'Publish' : 'Hidden';

         $fee_data_head->update();

        toastr()
       ->timeout(2000)
       ->closeButton(true)
       ->success('Fee data updated successfully.');

       return redirect()->route('admin.viewFeehead');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fee_delete = FeeHead::find($id);
        $fee_delete->delete(); 

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Fee data deleted successfully.');

        return redirect()->back();
 
    }
}
