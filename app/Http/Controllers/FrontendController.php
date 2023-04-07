<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
//        $data['datas2'] = Department::get();
        $data['datas2'] = Department::select('id', 'name')->orderBy('name')->get();
        $data['doctors'] = Doctor::select('fee', 'name')->orderBy('name')->get();
        $data['fee'] = Doctor::select('fee', 'fee')->orderBy('name')->get();
//        return $datas;
        return view('layouts.site', $data);

    }
}
