<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Events.
 *
 * @package namespace App\Models;
 */
class Events extends Model
{
    use Sluggable;

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
        'body',
        'venue',
        'start_date',
        'end_date',
        'user_id',
        'department_id'
    ];

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

//    /**
//     * Get the number of Events in a department.
//     * @return mixed
//     */
//    public function eventCount(){
//        return $this->event()->count();
//    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    //Event can have many users.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
