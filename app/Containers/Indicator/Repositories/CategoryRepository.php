<?php

namespace App\Containers\Indicator\Repositories;

use App\Containers\Indicator\Models\Category;
use App\Containers\Indicator\Models\Indicator;
use App\Ship\Abstracts\Repositories\Repository;

class CategoryRepository extends Repository
{
    protected $fieldSearchable = [
        'name'  => 'like',
        'email' => '=',
    ];

    public function getCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    public function getCategory($id)
    {
        return Category::find($id);
    }
}
