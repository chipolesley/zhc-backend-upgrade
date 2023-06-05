<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentConsultant extends Model
{
    protected $table = 'tblagentconsultant';

    /**
     *  get the booking for this line item
     */
    public function Booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'ID', 'Consultant');
    }
}
