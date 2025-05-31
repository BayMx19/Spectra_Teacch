<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubLessonsModel extends Model
{
    protected $table = "sub_lessons";
    protected $fillable = [
        'lessons_id',
        'title',
        'description',
        'table_data',
        'image_path',
        'order',
    ];

    public function lesson()
    {
        return $this->belongsTo(LessonsModel::class, 'lesson_id');
    }
}
