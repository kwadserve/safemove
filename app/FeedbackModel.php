<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no','skill', 'quality', 'attributes', 'experience','time_delivery',
        'breakage','work_start','labour_commit','correct_vehical','dob','working_company', 'rating','suggestion','created_by','updated_by','isdelete'];
}
