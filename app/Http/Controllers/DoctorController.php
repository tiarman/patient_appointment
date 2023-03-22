<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Department;
use App\Models\Doctor;
use Couchbase\QueryException;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $data['datas'] = Doctor::get();
//        $data['datas2'] = Department::get();
//        return $data;
        return view('admin.doctor.list', $data);
    }


    public function create(){
        $data['datas2'] = Department::get();
//        return $data['datas2'][0]->name;
        return view('admin.doctor.create', $data);
    }

    public function store(Request $request){
        $message = '<strong>Congratulations!!!</strong> User successfully';
        $doctor = new Doctor();
        $rules['department_id'] = 'required|string';
        $rules['name'] = 'required|string';
        $rules['phone'] = 'required|string';
        $rules['fee'] = 'required|string';

        $request->validate($rules);


        try {
            $doctor->department_id = $request->department_id;
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->fee = $request->fee;

            if ($doctor->save()){
                return RedirectHelper::routeSuccess('doctor.create', $message);
            }

        }catch (QueryException $e){
            return RedirectHelper::backWithInputFromException();
        }
    }

    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
            $user = Doctor::find($id);
            if ($user->delete()) {
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }
}
