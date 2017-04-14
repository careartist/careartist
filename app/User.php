<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password', 
        'verified', 
        'email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    
    // Set the verified status to true and make the email token null
    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }
}
