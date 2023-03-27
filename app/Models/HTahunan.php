<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTahunan extends Model
{
    use HasFactory;
    protected $connection = 'hharian';
    public $table = 'htahunan';
}
