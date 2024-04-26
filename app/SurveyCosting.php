<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCosting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_survey_costing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["survey_id",'loading_chrg','local_transp','transportation_chrg','unloading_chrg','delivery_chrg'
                            ,'car_transp_chrg','other_chrg','total_costing'];
}
