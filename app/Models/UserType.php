<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = "user_type";
    protected $primaryKey = 'user_type_id';
    public const NORMAL_USER = 1;
    public const RESTAURANT_OWNER = 2;

    protected $fillable = [
      'user_type_id',
      'title',
      'created_at'
    ];
}
