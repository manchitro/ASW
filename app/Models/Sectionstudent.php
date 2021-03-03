<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectionstudent extends Model
{
    use HasFactory;
    protected $guarded = [
        'sectionid',
        'studentid',
    ];
}
