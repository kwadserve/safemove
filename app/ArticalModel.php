<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticalModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_tbl_home_equipment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['eq_name','eq_lenght','eq_width','eq_height','eq_sq_feet','eq_cft','eq_type','isdelete','created_by','updated_by'];
}
