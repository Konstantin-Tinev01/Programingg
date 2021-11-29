<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'room_number',
        'type_of_room',
        'money_per_week',
        'count_of_desks',
        'room_manager',
        'id_of_room_manager',
        //'client',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'money_per_week',
        'room_manager',
        'id_of_room_manager',
    ];
}
