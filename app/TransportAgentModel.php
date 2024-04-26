<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportAgentModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_transport_agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trans_agent_name','trans_name','contact_no','contact_no2','contact_no3','contact_email','address','isdelete','created_by','updated_by'
    ];
}
