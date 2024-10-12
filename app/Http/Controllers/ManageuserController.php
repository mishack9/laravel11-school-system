<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
