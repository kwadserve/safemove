<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceSettingModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_invoice_setting';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['invoice_prefix', 'quot_prefix', 'service_tax_no', 'pan_no',
        'invoice_currency','payment_currency','creadted_by','updated_by','isdelete' ];
}
