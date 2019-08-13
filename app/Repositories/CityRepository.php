<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories
 * @version August 7, 2019, 9:42 am UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return City::class;
    }
}
