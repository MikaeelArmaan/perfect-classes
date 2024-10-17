<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class image
 * @package App\Models
 * @version October 5, 2024, 10:30 pm +07
 *
 * @property \App\Models\banner $id
 * @property string $type
 * @property string $image
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property integer $parent_id
 */
class image extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'image';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'image',
        'title',
        'subtitle',
        'description',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'image' => 'string',
        'title' => 'string',
        'subtitle' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'title' => 'required',
        'parent_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\banner::class, 'id', 'parent_id');
    }
}
