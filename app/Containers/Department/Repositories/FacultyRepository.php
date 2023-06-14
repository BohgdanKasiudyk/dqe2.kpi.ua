<?php

namespace App\Containers\Department\Repositories;

use App\Containers\Department\Models\Faculty;
use App\Ship\Abstracts\Repositories\Repository;

class FacultyRepository extends Repository
{
    protected $fieldSearchable = [
        'name'  => 'like',
        'email' => '=',
    ];

    public function getFaculties()
    {
        return Faculty::all();
    }
}
