<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmJobModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_confirm_job';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'survey_id', 'moving_date', 'moving_time','status','isdelete','created_by','updated_by'];
}
