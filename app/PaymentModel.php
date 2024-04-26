<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_payment_recp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'invoice_no', 'invoice_amt', 'paid_amt','bal_amt',
        'previous_tds', 'cur_paid_amt','cur_tds','payment_mode','bank_name','narrations','isdelete','created_by','updated_by'
    ];
}
