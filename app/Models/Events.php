<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Events.
 *
 * @package namespace App\Models;
 */
class Events extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title',
        'description',
        'venue',
        'start_date',
        'end_date',
    ];

    // Relationships

    public function event(){
        return $this->belongsTo(Department::class,    'departments_id');
    }

    //Event can have many users.
    public function users(){
        return $this->belongsTo(Users::class, 'users_id');
    }

    //Get Number of Events in a department.
    public function EventCount(){
        return $this->event()->count();
    }

    //Returns the Sluggable config for this Model :: Returns an array.
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
