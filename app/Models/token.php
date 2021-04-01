<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    protected $table = 'token';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
