<?php

namespace App\Repositories;

use App\Models\BannerImages;
use App\Repositories\BaseRepository;

/**
 * Class BannerImagesRepository
 * @package App\Repositories
 * @version October 17, 2024, 1:47 am +07
*/

class BannerImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'banner_id',
        'image',
        'url',
        'title',
        'description'
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
        return BannerImages::class;
    }

    
}
