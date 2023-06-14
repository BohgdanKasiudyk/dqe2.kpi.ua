<?php

namespace App\Containers\Department\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentResults extends Model
{

    protected $table = 'departments_results';

    protected $fillable = [];
    protected $guarded = [];

    public function department(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
