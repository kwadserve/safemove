<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackupDatabase extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_tbl_backup_database';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dbfile_name','isdelete'];
}
