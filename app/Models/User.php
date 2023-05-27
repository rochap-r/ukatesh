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
        'sname',
        'lname',
        'gender',
        'phone',
        'description',
        'email',
        'password',
        'role_id',
        'type_user_id',
        'fonction_id',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function typeUser()
    {
        return $this->belongsTo(TypeUser::class);
    }

    public function fonction()
    {
        return $this->belongsTo(Fonction::class);

    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //methode statique
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('sname', 'like', $term)
                ->orWhere('email', 'like', $term);
        });
    }

}
