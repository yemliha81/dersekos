<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'grade',
        'start',
        'end',
        'meet_url',
        'is_free',
        'price',
        'min_person',
        'max_person',
        'teacher_id',
        'attendees'
    ];

    //teacher relation, an event belongs to a teacher, event_table has teacher_id as foreign key, teacher_table has id as primary key
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    

}


