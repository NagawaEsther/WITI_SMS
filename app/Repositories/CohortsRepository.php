<?php

namespace App\Repositories;

use App\Models\Cohorts;
use App\Repositories\BaseRepository;

/**
 * Class CohortsRepository
 * @package App\Repositories
 * @version January 27, 2025, 7:02 pm UTC
*/

class CohortsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'status',
        'students',
        'start_date',
        'end_date'
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
        return Cohorts::class;
    }
}
