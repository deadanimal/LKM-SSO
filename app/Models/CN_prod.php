<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CN_prod extends Model
{
    protected $connection = 'webstat';
    public $table = 'cn_prod';

}
