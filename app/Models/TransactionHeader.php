<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table      = "transaction_header";
    protected $primaryKey = "id";
    public $incrementing  = true;
    public $timestamps    = true;

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'header_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
