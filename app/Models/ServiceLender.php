<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceLender extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'logo',
        'age_limit',
        'effective_interest_rate',
        'repayment_period',
        'description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
