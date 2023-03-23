<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function doctors($department_id) {
        $data['districts'] = Doctor::where("department_id", $department_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }
}
