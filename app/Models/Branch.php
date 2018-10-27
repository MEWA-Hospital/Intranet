<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Branch.
 *
 * @package namespace App\Models;
 */
class Branch extends Model implements Transformable
{
    use TransformableTrait;

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
        'slug',
        'email',
        'telephone',
        'physical_address',
        'country_id',
        'city_id',
        'token'
    ];

    /*
   |--------------------------------------------------------------------------
   | RELATIONSHIPS
   |--------------------------------------------------------------------------
   */

    /**
     * A Branch can have many departments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }


}
