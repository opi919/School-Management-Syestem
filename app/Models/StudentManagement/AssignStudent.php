<?php

namespace App\Models\StudentManagement;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function group(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class,'id','assign_student_id');
    }
}
