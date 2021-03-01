<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'classtype',
        'starttime',
        'endtime',
        'room',
    ];
    protected $guarded = [
        'sectionid',
        'qrcode',
        'qrstart',
        'qrend',
    ];
}
