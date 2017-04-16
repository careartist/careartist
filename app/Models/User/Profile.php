<?php

namespace App\Models\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Address;

class Profile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'screen_name',
        'first_name',
        'last_name',
        'avatar',
        'uap_number',
        'phone_number',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
