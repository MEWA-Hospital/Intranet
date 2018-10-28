<?php

namespace App\Models;

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
    use TransformableTrait, SoftDeletes;

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
        'mailing_list'
    ];

    /**
     *  a department belongs to a branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    /**
     *  A department can have many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function membership()
    {
        return $this->hasMany(User::class);
    }

}
