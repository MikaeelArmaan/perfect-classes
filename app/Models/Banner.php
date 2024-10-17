<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Banner
 * @package App\Models
 * @version October 5, 2024, 5:11 pm +07
 *
 * @property string $name
 * @property string $url
 * @property string $image
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property integer $sequence
 * @property string $position
 */
class Banner extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'banner';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'url',
        'image',
        'title',
        'subtitle',
        'description',
        'sequence',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'title' => 'string',
        'subtitle' => 'string',
        'sequence' => 'integer',
        'position' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'required'
    ];

    public function bannerImages()
    {
        return $this->hasMany(\App\Models\bannerImages::class);
    }
}
