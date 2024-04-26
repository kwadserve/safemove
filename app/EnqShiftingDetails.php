<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnqShiftingDetails extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_enquiry_shiping_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['last_eq_id', 'total_cft', 'kilometer', 'exp_vehical','exp_no_of_lab_req', 'labour_charges', 'transport_charges', 'packing_charges', 'total_amt','goods_value'];
}