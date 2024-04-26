<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailIntegrationModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_email_integration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['host_name','port_no','user_name','password','encryption','updated_by'];
}
