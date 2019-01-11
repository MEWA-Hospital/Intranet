<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Models;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
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
    use Sluggable, SoftDeletes, Searchable;

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
        'extension_id',
        'bank_id',
        'bank_branch_id'
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
    | SCOPES
    |--------------------------------------------------------------------------
    */
    /**
     * @param $query
     * @param Carbon|null $date_employed
     * @return mixed
     */
    public function scopeNewEmployees($query, $date_employed = null)
    {
        if (is_null($date_employed)) {
            $date_employed =  Carbon::now()->month;
        }

        $year = Carbon::now()->year;

        return $query->whereMonth('date_employed', $date_employed)->whereYear('date_employed', $year);
    }

    /**
     * Retrieves Employee birthdays
     *
     * @param $query
     * @param null $dob
     * @return mixed
     */
    public function scopeBirthday($query, $dob = null)
    {
        if (is_null($dob)) {
            $dob = Carbon::today();
        }

        return $query->whereMonth('dob', $dob->month)->whereDay('dob', $dob->day);
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
     * An employee can belong to a particular type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(EmployeeType::class, 'employee_type_id', 'id', 'employees');
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
     * Employee can have an extension
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function extension()
    {
        return $this->hasOne(Extension::class);
    }


}
