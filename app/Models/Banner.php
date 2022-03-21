<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $tabl = 'banners';
    protected $fillable = [
        'banner_name',
        'title',
        'description',
        'link',
        'image',
    ];
}
