<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SrcDestExpenssModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_src_dest_expenss';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no','source_total','dest_total','total','isdelete','created_by','updated_by'];
}
