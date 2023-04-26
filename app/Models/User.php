<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token'
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


    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by','id'); // Required Add FK
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'instractor_id','id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'schedules','instractor_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class,'created_by','id');
    }
}
