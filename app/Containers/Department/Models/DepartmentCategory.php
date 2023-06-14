<?php

namespace App\Containers\Department\Models;

use App\Containers\Indicator\Models\Category;
use Illuminate\Database\Eloquent\Model;

class DepartmentCategory extends  Model
{
    protected $table = 'departments_category';

    protected $fillable = [];
    protected $guarded = [];

    public function department(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Department::class, 'id', 'dep_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
