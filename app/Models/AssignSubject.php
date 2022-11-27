<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function Student_class()
    {
        // TO DISPLAY THE NAME FIELD IN FEE AMOUNT DETAILS PAGE TABLE 
        //MATCHING THE CLASS_ID IN FEE_CATEGORY_AMOUNTS TABLE WITH THE ID IN STUDENT CLASSES TABLE
        return $this->belongsTo(StudentClass::class,'class_id','id');  
    }

    public function school_subject()
    {
        // TO DISPLAY THE NAME FIELD IN FEE AMOUNT DETAILS PAGE TABLE 
        //MATCHING THE CLASS_ID IN FEE_CATEGORY_AMOUNTS TABLE WITH THE ID IN STUDENT CLASSES TABLE
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');  
    }
}
