<?php

namespace App\Containers\Indicator\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatasetTypes extends  Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cls_datasets';
    protected $fillable = [];
    protected $guarded = [];

    public function indicator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Indicator::class, 'id', 'indicator_id');
    }
}
