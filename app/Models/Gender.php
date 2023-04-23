<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

     public const MALE = 1;
     public const FEMALE = 2;
     public const OTHER = 3;

    protected $table = 'gender';
    protected $primaryKey = 'gender_id';
    protected $fillable = [
        'name'
    ];
}
