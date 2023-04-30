<?php

namespace App\Models;

use App\Http\Controllers\NewsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = "restaurant";
    protected $primaryKey = 'restaurant_id';

    protected $fillable = [
      'name',
      'description',
      'profile_image',
      'email',
      'address',
      'phone_no',
      'phone_no_2',
      'has_outdoor',
      'has_indoor',
      'is_available',
      'city_id',
      'owner_id',
      'is_open',
      'facebook_link',
      'instagram_link',
      'website_link',
    ];

  public function reservations(){
      return $this->hasMany(Reservation::class,"reservation_id");
  }

  public function city(){
      return $this->belongsTo(City::class,"city_id");
  }

  public function owner(){
      return $this->belongsTo(User::class,"owner_id");
  }

  public function news(){
      return $this->hasMany(News::class,"restaurant_id");
  }

  public function menu(){
      return $this->hasOne(Menu::class,"restaurant_id");
  }
}
