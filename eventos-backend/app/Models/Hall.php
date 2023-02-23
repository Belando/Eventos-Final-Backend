<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'place',
        'description',
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }
    
    public function event() {
        return $this->hasMany(Event::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}