<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'star_name',
        'website_date',
        'total_score',
        'total_desc',
        'love_score',
        'love_desc',
        'career_score',
        'career_desc',
        'wealth_score',
        'wealth_desc',
    ];
}
