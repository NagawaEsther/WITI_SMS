<?php

namespace App\Repositories;

use App\Models\Program;
use App\Repositories\BaseRepository;

/**
 * Class ProgramRepository
 * @package App\Repositories
 * @version November 16, 2024, 10:24 am UTC
*/

class ProgramRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'duration',
        'status',
        'program_code',
        'credit_required',
        'created_by'
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
        return Program::class;
    }
}
