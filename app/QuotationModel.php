<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_quotation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'transport_by', 'km', 'amount','goods_value', 'discount', 'other', 'time_req_for_packing','prior_notice'
        , 'transist_time', 'payment_terms', 'net_amount','cost_type', 'cost_in_freight_val', 'cost_in_service_tax', 'cost_ex_ins_val','cost_ex_service_tax'
        ,'quot_status','isdelete','created_by','updated_by','after_insurance_amnt','after_service_tax'];
}
