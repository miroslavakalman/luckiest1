<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Добавляем 'user_id' в массив fillable
        'mood_level',
        'description',
    ];
}
