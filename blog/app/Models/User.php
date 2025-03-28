<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function post() {
        // return $this->hasOne('App\Post', 'the_user_id'); // if you named it differently
        return $this->hasOne('App\Models\Post');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function roles() {
        // return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
        
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at', 'updated_at');
    }

    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    // Naming convension is get{nameofthecolumn}Attribute
    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    // Setting data before we send it to the database. the name is set{nameofthecolumn}Attribute.
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }
}
