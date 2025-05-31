<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonsModel extends Model
{
    use HasFactory;
    protected $table = "lessons";
    protected $fillable = [
        'module_id',
        'title',
        'description',
        'order',
    ];

    public function modules()
    {
        return $this->belongsTo(ModulesModel::class, 'module_id');
    }

    public function subLessons()
    {
        return $this->hasMany(SubLessonsModel::class);
    }
}