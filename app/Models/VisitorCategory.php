<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorCategory extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function visitor() {
        return $this->hasOne(Visitor::class);
    }
    public static function allCategories(){
        return self::all();
    }
}
