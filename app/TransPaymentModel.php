<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransPaymentModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_transport_payment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'payment_to','trans_type','payment_mode','to_be_paid_at','trans_amt', 'paid_amt','bank_name',
        'bal_amt', 'amount','narrations','trans_status','isdelete','created_by','updated_by'
    ];
}
