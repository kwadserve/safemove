<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffExpCatogryModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_off_exp_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_name','isdelete','created_by','updated_by'];
}
