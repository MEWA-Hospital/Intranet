<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class Document.
 *
 * @package namespace App\Models;
 */
class Document extends Model
{
    use Sluggable, Mediable;

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
        'uuid',
        'name',
        'description',
        'user_id'
    ];

    protected $with = ['media'];

    /**
     * Set the allowed extension type
     * @return array
     */
    public static $document_ext = ['doc', 'docx', 'pdf', 'odt'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    public static function getAllowedExtensions()
    {
        $merged_arr = array_merge(self::$document_ext);
        return implode(',', $merged_arr);
    }

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    public function getType($ext)
    {
        if (in_array($ext, self::$document_ext)) {
            return 'document';
        }
    }

    /**
     * Get maximum file size
     * @return int maximum file size in kilobites
     */
    public static function getMaxSize()
    {
        return (int)ini_get('upload_max_filesize') * 1000;
    }

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
            ->performOnCollections('images');;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
