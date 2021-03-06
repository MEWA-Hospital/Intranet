<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Domain\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Mediable;

class Department extends BaseModel
{
    use SoftDeletes, Sluggable, Mediable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

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
     * A department can have many events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
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
