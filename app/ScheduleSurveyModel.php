<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleSurveyModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_schedule_survey';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'schedule_date', 'schedule_time', 'assing_emp','isdelete','schedule_status','created_by','updated_by','survey_remark'];
}
