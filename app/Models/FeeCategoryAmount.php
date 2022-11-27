<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    public function fee_category()
    {
        // TO DISPLAY THE NAME FIELD IN FEE CATEGORIES TABLE 
        //REFERENCED BY THE FEE_CATEGORIES_ID FROM THE FEE_CATEGORY_AMOUNTS TABLE
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');  
    }


    public function Student_class()
    {
        // TO DISPLAY THE NAME FIELD IN FEE AMOUNT DETAILS PAGE TABLE 
        //MATCHING THE CLASS_ID IN FEE_CATEGORY_AMOUNTS TABLE WITH THE ID IN STUDENT CLASSES TABLE
        return $this->belongsTo(StudentClass::class,'class_id','id');  
    }
}
