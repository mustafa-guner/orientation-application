<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "restaurant_menu";
    protected $primaryKey="menu_id";
    protected $fillable = [
      "menu_image",
      "restaurant_id"
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class,"restaurant_id");
    }
}
