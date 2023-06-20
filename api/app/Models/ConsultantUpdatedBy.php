<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsultantUpdatedBy extends Model
{
    /**
     *  The table associated with the Consultant Model
     * @var string
     */
    protected $table = 'tblconsultant';

    public function Booking(): BelongsTo
    {
        $this->belongsTo(Booking::class,'ID','LastUpdatedBy');
    }
}
