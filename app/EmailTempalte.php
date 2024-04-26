<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTempalte extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_email_tempaltes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email_for', 'email_body','created_by','updated_by','isdelete'];
}
