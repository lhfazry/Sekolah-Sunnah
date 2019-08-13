<?php

namespace App\Repositories;

use App\Models\Facility;
use App\Repositories\BaseRepository;

/**
 * Class FacilityRepository
 * @package App\Repositories
 * @version August 9, 2019, 2:05 pm UTC
*/

class FacilityRepository extends BaseRepository
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
        return Facility::class;
    }
}
