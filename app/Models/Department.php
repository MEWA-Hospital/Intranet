<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 8:16 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Department.
 *
 * @package namespace App\Models;
 */
class Department extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes, Sluggable;

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
        'name',
        'token',
        'slug',
        'email',
        'mailing_list',
        'memo_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     *  A department can have many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function membership()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Counts department members
     *
     * @return int
     */
    public function membersCount()
    {
        return $this->membership()->count();
    }

    /**
     * A department can have many evenets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Events::class);
    }

    /**
     * A department can have many employees
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Count number of employees in a department
     * @return int
     */
    public function employeesCount()
    {
        return $this->employees()->count();
    }

    /**
     * A department can have many memos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memo()
    {
        return $this->belongsToMany(Memo::class);
    }

    /**
     * A department can have many extension numbers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extensions()
    {
        return $this->hasMany(Extension::class);
    }
}
