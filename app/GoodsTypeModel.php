<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsTypeModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_goods_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['goods_type','isdelete','created_by','updated_by'];
}
