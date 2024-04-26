<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingListModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_packing_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_no', 'supervisor_name', 'packer_name1', 'packer_name2','packer_name3',
        'packer_name4', 'packer_name5','packer_name6','uploade_image','goods_value','isdelete','created_by','updated_by'
    ];
}
