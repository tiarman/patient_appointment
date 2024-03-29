<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'department_id',
        'name',
        'phone',
        'fee',
    ];


    public function department_id(){
        return $this->hasMany(Department::class,'department_id','id');
    }
}
