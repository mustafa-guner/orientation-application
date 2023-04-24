<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public const PENDING = 1;
    public const CONFIRMED = 2;
    public const REJECTED = 3;

    protected $table = "status";
    protected $primaryKey = 'status_id';

    protected $fillable = [
        'name'
    ];
}
