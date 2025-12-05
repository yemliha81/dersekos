<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start',
        'end',
        'meet_url',
        'is_free',
        'price',
        'min_person',
        'max_person',
        'teacher_id'
    ];

}
