<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWordpress extends Model
{
    use HasFactory;
    protected $connection = "wp";
    protected $table = "wp_users";
    protected $guarded = ["id"];

    public $timestamps = false;
}
