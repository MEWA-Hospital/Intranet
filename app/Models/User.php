<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 8:19 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', '
        last_name',
        'email',
        'telephone',
        'password',
        'slug',
        'designation',
        'department_id',
        'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     *  A User can belong to many departments (can be transferred over time)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
