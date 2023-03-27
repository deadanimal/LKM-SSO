<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HHarian extends Model
{
    use HasFactory;

    protected $connection = 'hharian';

    public $table = 'hharian';
    protected $dates = ['TARIKH'];
}
