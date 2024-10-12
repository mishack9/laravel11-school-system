<?php

namespace App\Http\Controllers;

use App\Models\Acedamicyear;
use App\Models\Classs;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class_id = Classs::all();
        $fee_head_id = FeeHead::all();
        $acedamic_year_id = Acedamicyear::all();
        return view('admin.feehead.addfee_struture',['class_data' => $class_id, 'fee_head_data' => $fee_head_id, 'data_fee' => $acedamic_year_id]);
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
            'class_id' => ['required'],
            'fee_head_id' => ['required'],
            'acedamic_year_id' => ['required']
        ]);

        FeeStructure::create($request->all());

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Fee Structure Added Successfully......');
 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function read()
    {
        $fee_structure['fee_structure'] = FeeStructure::with(['Feehead', 'Acedamic_Year', 'Class'])->latest()->get();
        return view('admin.feehead.viewfee_structure', $fee_structure);
        /* dd($fee_structure); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edith($id)
    {
        $data['class_data'] = Classs::all();
        $data['fee_head_data'] = FeeHead::all();
        $data['acedamic_year_data'] = Acedamicyear::all();
        $data['fee'] = FeeStructure::find($id);
        return view('admin.feehead.updatefee_struture',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update_feeStructure = FeeStructure::find($id);
        $update_feeStructure->update($request->all());

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Fee Structure Updated Successfully......');
 
        return redirect()->route('admin.feeStructure_Read');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete_fee_structure = FeeStructure::find($id);
        $delete_fee_structure->delete();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Fee Structure Data Deleted Successfully......');
 
        return redirect()->back();
    }
}
