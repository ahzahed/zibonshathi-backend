<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password','user_type','status',
        'name', 'email','phone','gender','age','height', 'location','religion','mothertongue','occupation','maritalstatus','avatar',
        'details',
        'weight','bodytype','blood','smoke','complexion','dob','country','grewup',
        'fatherstatus','motherstatus','brothers','sisters',
        'education','university','income','workingwith','profession',
        'phone','userfacebook',
        'testimonial',
        'payment_id','paying_amount','blnc_transection','payment_date','payment_exp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
