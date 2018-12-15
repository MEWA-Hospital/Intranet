<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee.
 *
 * @package namespace App\Models;
 */
class Employee extends Model
{
    use Sluggable, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dob',
        'date_employed'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'department_id',
        'designation',
        'biometric_code',
        'employee_type_id',
        'staff_no',
        'national_id_no',
        'bank_account_no',
        'kra_pin',
        'nssf_no',
        'nhif_no',
        'name',
        'gender',
        'dob',
        'date_employed',
        'physical_address',

    ];

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
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    /**
     * Custom format for the dob date
     *
     * @param $value
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    /**
     * Custom format for the date_employed date
     *
     * @param $value
     * @return string
     */
    public function getDateEmployedAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     *  Employee records belongs to a user account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *  Employee can belong to a department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     *  Employee can have many email account
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email()
    {
        return $this->hasMany(EmployeeEmail::class);
    }

    /**
     * Employee can have many telephone numbers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telephone()
    {
        return $this->hasMany(EmployeeTelephone::class);
    }

}
