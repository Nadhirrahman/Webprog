<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table      = "transaction_detail";
    protected $primaryKey = "id";
    public $incrementing  = true;
    public $timestamps    = true;

    public function furniture()
    {
        return $this->belongsTo(Furniture::class, 'furniture_id', 'id')->withTrashed();
    }
}
