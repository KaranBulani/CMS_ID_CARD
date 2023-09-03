<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdCard extends Model
{
    protected $table = 'idcard';
    protected $primaryKey = 'dte_id';
    public $timestamps =false;
}
