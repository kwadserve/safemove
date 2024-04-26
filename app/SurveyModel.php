<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SurveyModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_survey';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no','survey_date','laboure_req','total_costing_amt','total_pack_mat_amt','margin','total_quot_amt'
        ,'goods_value','survey_status','isdelete','created_by','updated_by'];

    public static function checkQuoationIs($cn_no){
       $quot_data = DB::table('tbl_quotation')->where('cn_no',$cn_no)->get();

       if(count($quot_data)>=1){
           return $quot_data;
       }else{
           return array();
       }
    }

}
