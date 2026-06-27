<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'start_date',
        'end_date',
        'tag',
        'capacity',
        'location',
        'price',
        'featured',
        'status'
    ];
}
