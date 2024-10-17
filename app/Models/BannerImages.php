<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BannerImages
 * @package App\Models
 * @version October 17, 2024, 1:47 am +07
 *
 * @property \App\Models\banner $id
 * @property integer $banner_id
 * @property string $image
 * @property string $url
 * @property string $title
 * @property string $description
 */
class BannerImages extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'banner_images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'banner_id',
        'image',
        'url',
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'banner_id' => 'integer',
        'image' => 'string',
        'url' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'banner_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\banner::class, 'id', 'banner_id');
    }
}
