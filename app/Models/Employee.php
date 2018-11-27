<?php

namespace App\Models;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'department_id',
        'designation_id',
        'biometric_code',
        'employee_type_id',
        'staff_no',
        'country_id',
        'bank_id',
        'bank_branch_id',
        'national_id_no',
        'reports_to_id',
        'bank_account_no',
        'kra_pin',
        'nssf_no',
        'nhif_no',
        'name',
        'gender',
        'dob',
        'date_employed',
        'marital_status',
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

    /**
     * Employee can belong to a particular bank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

}
