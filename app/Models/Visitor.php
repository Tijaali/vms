<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(VisitorCategory::class);
    }

    public function depart(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
