<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyActivityLog extends Model
{
    protected $fillable = [
        'message',
        'company_id',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];
}
