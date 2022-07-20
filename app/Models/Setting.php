<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'logo', 'favicon', 'tophone', 'email', 'flogo', 'fdesc', 'location',
        'box', 'phone', 'creation'
    ];
}
