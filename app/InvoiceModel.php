<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_invoice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'bill_no', 'pur_order_no', 'pur_order_date','invoice_amount','payment_mode','invoice_status','created_by','updated_by','isdelete' ];
}
