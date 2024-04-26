<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_tracking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'invoice_no', 'start_date',
        'end_date', 'transist_day','isdelete','created_by','updated_by'
    ];
}
