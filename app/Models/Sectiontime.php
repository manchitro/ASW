<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectiontime extends Model
{
    use HasFactory;
    protected $fillable = [
        'classtype',
        'starttime',
        'endtime',
        'weekday',
        'room',
    ];
    protected $guarded = [
        'sectionid',
    ];
}
