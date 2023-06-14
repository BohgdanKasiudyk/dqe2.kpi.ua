<?php

namespace App\Containers\Department\Repositories;


use App\Containers\Department\Models\Department;
use App\Ship\Abstracts\Repositories\Repository;

class DepartmentRepository extends Repository
{
    protected $fieldSearchable = [
        'name'  => 'like',
        'email' => '=',
    ];

    /*
     * @return Department
     */
    public function getDepartments()
    {
        return Department::all()->where('visible', 1);
    }
}
