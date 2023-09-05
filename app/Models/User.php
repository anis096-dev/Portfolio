<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Skill;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Knowledge;
use App\Models\Experience;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'location',
        'phone',
        'bio',
        'occupation',
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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function knowledges()
    {
        return $this->hasMany(Knowledge::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
