<?php

namespace App\Models;

use Carbon\Carbon;
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
    protected $dates = ['start_date', 'end_date'];
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
    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withDefault([
            'name' => 'No department'
        ]);
    }

    //Event can have many users.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', Carbon::now());
    }
}
