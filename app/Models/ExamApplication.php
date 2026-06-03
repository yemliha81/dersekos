<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamApplication extends Model
{
    // soft deletes
    use HasFactory;

    protected $table = 'exam_application';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'exam_id',
        'full_name',
        'parent_full_name',
        'phone',
        'grade'
    ];

    // If you want to automatically cast created_at as datetime
    protected $dates = [
        'created_at'
    ];

}
