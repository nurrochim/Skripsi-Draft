<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelIncidentAnalyzing extends Model
{
    protected $fillable = array('id', 
                                'category_group',
                                'category_root_cause',
                                'issue_description',
                                'suspected_reason',
                                'respon_taken',
                                'decided_solution'
                                );
    protected $table = 'tbl_incidents';
}
