<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seat',
        'date'  
    ];

    public function getSeatAttribute($value){
        return rand($value, 1, 10000);
    }

    public function event() {
        return $this->hasMany(Event::class);
    }

    public function user() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}





