<?php

namespace App\Containers\Indicator\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use  SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'indicators_category';
    protected $fillable = [];
    protected $guarded = [];
}
