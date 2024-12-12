<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Admins extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
