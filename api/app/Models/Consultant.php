<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultant extends Model
{
    /**
     *  The table associated with the Consultant Model
     * @var string
     */
    protected $table = 'tblconsultant';

    public function Booking() {
        return $this->belongsTo(Booking::class,'ID','DoneBy');
    }

    public function Correspondence() {
        return $this->belongsTo(Correspondence::class,'ID','LoadedBy');
    }

}
