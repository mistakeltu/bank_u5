<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function sourceAccount()
    {
        return $this->belongsTo(Account::class, 'source_account_id');
    }

    use HasFactory;
}
