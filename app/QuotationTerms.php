<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationTerms extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_quotation_terms_condn';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quot_id', 'terms_cond'];
}
