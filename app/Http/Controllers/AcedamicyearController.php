<?php

namespace App\Http\Controllers;

use App\Models\Acedamicyear;
use Illuminate\Http\Request;

class AcedamicyearController extends Controller
{
    public function index()
    {
        return view('admin.acedamic-year');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_year' => ['required']
        ]);

        $acedamic_year = new Acedamicyear();

        $acedamic_year->name_year = $request->name_year;
        $acedamic_year->status = $request->status == true ? 1 : 0;

        $acedamic_year->save();
    

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Acedamic year added successfully.');

        return redirect()->back();
    }

    public function read()
    {
        $data['acedamic_year'] = Acedamicyear::get();
        return view('admin.view_acedamicyear',$data);
    }

    public function delete($id)
    {
        $data = Acedamicyear::find($id);
        $data->delete();
        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Acedamic year data deleted successfully.');

        return redirect()->back();
    }

    public function edith($id)
    {
        $data['acedamic_year'] = Acedamicyear::find($id);
        return view('admin.editAcedamic_year',$data);
    }

    public function Update(Request $request,$id)
    {
        $acedamic_year = Acedamicyear::find($id);

        $acedamic_year->name_year = $request->name_year;
        $acedamic_year->status = $request->status == true ? 1 : 0;

        $acedamic_year->update();

        toastr()
        ->timeout(2000)
        ->closeButton(true)
        ->success('Acedamic year data updated successfully.');

        return redirect()->route('admin.viewAcedamic_year'); 


    }
}
