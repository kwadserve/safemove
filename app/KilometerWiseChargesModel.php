<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KilometerWiseChargesModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_tbl_km_wise_amt';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['km_id','vehical_id','labour_charges','transport_charges','packing_charges','total_amt',
        'isdelete','created_by','updated_by'];
}
