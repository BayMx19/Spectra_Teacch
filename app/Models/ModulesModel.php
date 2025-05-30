<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesModel extends Model
{
    use HasFactory;
    protected $table = "modules";
    protected $fillable = [
        'title',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(LessonsModel::class)->orderBy('order');
    }
}