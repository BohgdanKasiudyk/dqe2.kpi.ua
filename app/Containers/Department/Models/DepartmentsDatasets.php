<?php

namespace App\Containers\Department\Models;
use App\Containers\Indicator\Models\DatasetTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentsDatasets extends model
{

    use SoftDeletes;

    protected $table = 'departments_datasets';

    protected $fillable = [];
    protected $guarded = [];

    public function datasettype(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(DatasetTypes::class, 'id', 'dataset_id');
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

}
