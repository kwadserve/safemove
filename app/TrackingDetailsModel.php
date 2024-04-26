<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingDetailsModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_tracking_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tr_id','cn_no', 'tracking_status', 'tracking_date','comment'];
}
