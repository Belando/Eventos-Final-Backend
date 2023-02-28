<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'description',
        'type',
        'hall_id',
        'organizer_id',
        'ticket_id'
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }

    public function getTypeAttribute($value){
        return substr($value, 1, 12);
    }

    public function organizer() {
        return $this->belongsTo(Organizer::class);
    }

    public function hall() {
        return $this->belongsTo(Hall::class);
    }

    public function ticket() {
        return $this->belongsToMany(Ticket::class);
    }

    public function user() {
        return $this->belongsToMany(User::class);
    }

}
