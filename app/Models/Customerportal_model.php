<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customerportal_model extends Model
{
    use HasFactory;
    protected $table = "customerportal";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}

