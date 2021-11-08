<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'create_by',
        'update_by',
        'group_id',
        'role_id',
        'parent_id',
        'status',
        'language',
        'token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    // protected $hidden = [
    //     'remember_token',
    // ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function contracts()
    {
        return $this->belongsToMany(Contract::class)
                    ->select([
                            'contract.id as id',
                            'parmas',
                            'name',
                            'uid',
                            'contract',
                            'customer',
                            'order_event',
                            'contract_start',
                            'contract_end',
                            'contract_fee',
                            'parmas',
                            'mark_up',
                            'pay_type',
                            'media_price',
                            'other_pays',
                            'contract.created_at as created_at',
                            'contract.updated_at as updated_at',
                    ])
                    ->join('users', 'users.id', '=', 'contract.uid');
    }
}
