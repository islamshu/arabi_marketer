<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use League\OAuth1\Client\Server\Server;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SpatieLogsActivity;
    use HasRoles,SoftDeletes,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'api_token',
    //     'password',
    // ];
    
    public function specialty()
    {
        return $this->belongsToMany(Specialty::class, 'user_categories','user_id', 'type_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function answer()
    {
        return $this->hasMany(UserAnswer::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function linkedSocialAccounts()
    {
        return $this->hasMany(SoialAccount::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function podcasts()
    {
        return $this->hasMany(NewPodcast::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follower()
    {
        return $this->hasMany(Followr::class);
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function soical()
    {
        return $this->hasOne(MarkterSoical::class);
    }
    public function con_user()
    {
        return $this->hasOne(UserConsultion::class);
    }
    
    public function consutiong()
    {
        return $this->hasMany(Consulting::class);
    }
    public function types()
    {
        return $this->hasMany(UserCategory::class);
    }
    public function socials()
    {
        return $this->hasMany(SouialUser::class);
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bank_info()
    {
        return $this->hasOne(BankInfo::class);
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    public function markter_order()
    {
        return $this->hasOne(MarkterOrder::class);
    }

    /**
     * Get a fullname combination of first_name and last_name
     *
     * @return string
     */
    // public function getNameAttribute()
    // {
    //     return "{$this->first_name} {$this->last_name}";
    // }

    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->info) {
            return asset($this->info->avatar_url);
        }

        return asset(theme()->getMediaUrlPath().'avatars/blank.png');
    }

    /**
     * User relation to info model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }
}
