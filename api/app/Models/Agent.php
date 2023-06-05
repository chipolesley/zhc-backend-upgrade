<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    protected $table = 'tblagent';
    /**
     *  Agent has_many agent consultants;
     */
    public function AgentConsultant(): HasMany {
        return $this->hasMany(AgentConsultant::class,'AgentIDC','AgentID');
    }

    /**
     *  get the booking for this line item
     */
    public function Booking(): BelongsTo{

        return $this->belongsTo(Booking::class,'ID','AgentID');
    }
}
