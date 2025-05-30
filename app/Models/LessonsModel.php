<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'pdf_path',
        'order',
    ];

    // Relasi: Satu lesson milik satu module
    public function module()
    {
        return $this->belongsTo(ModulesModel::class);
    }
}