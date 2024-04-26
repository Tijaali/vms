<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function visitor() {
        return $this->hasOne(Visitor::class);
    }
    public function security() {
        return $this->hasOne(SecurityOfficer::class);
    }
    public static function allDepartments(){
        return self::all();
    }
    protected $guarded =[];
    public function event(){
        return $this->hasOne(Event::class);
    }
}
