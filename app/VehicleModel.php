<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_tbl_vehical_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehical_name',
        'vehical_dimension',
        'cft_start_range',
        'cft_end_range',
        'labour_required'
    ];
}
