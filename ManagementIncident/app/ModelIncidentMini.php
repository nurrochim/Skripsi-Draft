<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelIncidentMini extends Model
{
    protected $fillable = array('id', 
                                'raise_date',
                                'priority',
                                'issue_description');
    protected $table = 'tbl_incidents';
}
