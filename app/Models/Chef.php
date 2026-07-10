<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chef';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fname',
        'lname',
        'designation',
        'image',
        'description',
        'experience',
        'awards',
        'facebook',
        'instagram',
        'linkedin',
        'status',
    ];
}
