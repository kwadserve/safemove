<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_transport_enq';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'good_trans_agent','vehi_trans_agent', 'good_amount',
        'gud_transist_time','isdelete','created_by','updated_by','good_type','vehical_amount','veh_tansist_time','narration'
    ];
}
