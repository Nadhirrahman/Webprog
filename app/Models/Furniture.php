<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
    use HasFactory, SoftDeletes;

    protected $table      = "furniture";
    protected $primaryKey = "id";
    public $incrementing  = true;
    public $timestamps    = true;
}
