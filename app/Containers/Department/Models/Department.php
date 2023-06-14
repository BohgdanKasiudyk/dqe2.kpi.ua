<?php

namespace App\Containers\Department\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $updated_at = '';

    public function faculty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }

    public function dataset(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( DepartmentsDatasets::class, 'department_id', 'id');
    }

}
