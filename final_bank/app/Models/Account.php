<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function sourceTransfers()
    {
        return $this->hasMany(Transfer::class, 'source_account_id');
    }

    public function targetTransfers()
    {
        return $this->hasMany(Transfer::class, 'target_account_id');
    }
}
