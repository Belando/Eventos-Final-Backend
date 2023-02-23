<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'description',
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }

    public function organizer() {
        return $this->belongsTo(Organizer::class);
    }

    public function hall() {
        return $this->belongsTo(Hall::class);
    }

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

}
