<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiyFollowup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_enquiry_followup';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['enq_id', 'cn_no', 'followup_date','conversation','rating'];
}
