<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'department_id',
        'timing',
        'venue',
        'brochure',
    ];
    public function depart() {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function eventRegisteration(){
        return $this->hasMany(EventRegisteration::class);
    }
}
