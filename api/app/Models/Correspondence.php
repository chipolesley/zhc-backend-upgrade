<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Correspondence extends Model
{
    /**
     *  The table associated with the Correspondence Model
     * @var string
     */
    protected $table = 'tblcorrespondence';

    public  function Booking() {
        return $this->belongsTo(Booking::class,'ID','BookingID');
    }

    /**
     *  Correspondence _has_load consultant who uploaded it last
     */
    public function Consultant(){
        return $this->hasOne(Consultant::class,'ID','LoadedBy');
    }
}
