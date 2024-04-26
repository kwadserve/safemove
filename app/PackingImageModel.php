<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingImageModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_packing_list_image';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no','upload_image','isdelete' ];
}
