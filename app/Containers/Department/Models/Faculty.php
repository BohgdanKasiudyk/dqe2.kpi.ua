<?php

namespace App\Containers\Department\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'facultys';
    protected $fillable = [];
    protected $guarded = ['*'];
}
