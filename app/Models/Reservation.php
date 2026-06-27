<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'phone',
        'reservation_date',
        'reservation_time',
        'guests',
        'occasion',
        'special_request',
        'status',
    ];
}
