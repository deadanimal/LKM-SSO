<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'webstat';
    public $table = 'cn_prod';
}
