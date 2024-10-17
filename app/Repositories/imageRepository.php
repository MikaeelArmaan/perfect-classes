<?php

namespace App\Repositories;

use App\Models\image;
use App\Repositories\BaseRepository;

/**
 * Class imageRepository
 * @package App\Repositories
 * @version October 5, 2024, 10:30 pm +07
*/

class imageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'image',
        'title',
        'subtitle',
        'description',
        'parent_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return image::class;
    }
}
