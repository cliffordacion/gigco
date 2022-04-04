<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Song extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'url',
        'artist_name',
        'duration'
    ];
}
