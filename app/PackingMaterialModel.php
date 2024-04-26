<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingMaterialModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_packing_material';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['material_type', 'rate','isdelete','created_by','updated_by'
    ];
}
