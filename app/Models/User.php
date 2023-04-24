<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
        'gender_id',
        'city_id',
        'user_type_id',
        'birth_date',
        'profile_image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function restaurant(){
        return $this->hasOne(Restaurant::class,"owner_id");
    }

    public function reservations(){
        return $this->hasMany(Reservation::class,"reserved_by");
    }

    public function setPasswordAttribute($pwd){
        $this->attributes['password'] = bcrypt($pwd);
    }
    function getDobAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }



}
