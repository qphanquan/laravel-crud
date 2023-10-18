<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = [
        'id',
        'name',
        'bio',
        'updated_at',
        'created_at',
    ];
    use HasFactory;
}
