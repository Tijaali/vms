<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'message'];
    public function visitor()
    {
    return $this->belongsTo(Visitor::class);
    }
}
