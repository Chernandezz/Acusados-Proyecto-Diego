<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acusado extends Model
{
    use HasFactory;
    protected $primaryKey = 'cedula';
    public $timestamps = false;
}
