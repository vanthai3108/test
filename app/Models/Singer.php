<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $fillable = [
        "singer_name",
        "singer_detail",
        "singer_image"
    ];
}
