<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalCftModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_tbl_additional_cft';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cft_start_range', 'cft_end_range', 'additional_cft','created_by','updated_by','isdelete'
    ];
}
