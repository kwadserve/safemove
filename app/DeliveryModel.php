<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_delivery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'truck_no', 'no_of_packages', 'value_of_goods','type_of_packing',
        'mode_of_dispatch', 'risk_type','private_mark','created_by','updated_by','isdelete'
    ];
}
