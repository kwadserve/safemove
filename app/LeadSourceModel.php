<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadSourceModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_lead_source';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lead_source','isdelete','created_by','updated_by'];
}
