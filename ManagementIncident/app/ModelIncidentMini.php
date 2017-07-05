<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelIncidentMini extends Model {

    protected $fillable = array('id',
                                'raise_date',
                                'priority',
                                'issue_description',
                                'module',
                                'sub_module',
                                'pic_analyzing',
                                'pic_fixing',
                                'pic_testing'
                            );
    protected $table = 'tbl_incidents';

}
