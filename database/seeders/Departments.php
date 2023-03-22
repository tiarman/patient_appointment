<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Departments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $One = Department::create([
            'name' => 'Medicine',
        ]);
        $One = Department::create([
            'name' => 'Surgery',
        ]);
        $One = Department::create([
            'name' => 'Dental',
        ]);
    }
}
