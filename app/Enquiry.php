<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_enquiry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no','cust_name', 'cust_email', 'cust_contact','cust_alt_contact', 'source','enquiry_type', 'reference','reference_status',
        'destination', 'exp_shifting_date','created_by','updated_by','isdelete','enq_status','follow_up','follow_up_date',
        'follow_up_convr'
    ];
}
