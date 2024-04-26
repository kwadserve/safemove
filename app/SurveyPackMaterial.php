<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyPackMaterial extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_survey_packing_mate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['survey_id','roll_qty','roll_price','roll_total_amt','tap_qty','tap_price','tap_total_amt','boxes_qty'
                            ,'boxes_price','boxes_total_amt','airbubble_qty','airbubble_price','airbubble_total_amt','thermacol_qty'
                            ,'thermacol_price','thermacol_total_amt','newspaper_qty','newpaper_price','newspaper_total_amt'
                            ,'strfilm_qty','strfilm_price','strfilm_total_amt','foamsheet_qty','foamsheet_price','foamsheet_total_amt'
                            ,'other_qty','other_price','other_total_amt'];
}
