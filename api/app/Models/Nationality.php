<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nationality extends Model
{
    /**
     *  The table associated with the Nationality Model
     * @var string
     */
    protected $table = 'tblnationality';

    public  function booking(): BelongsTo {
            $this->belongsTo(Booking::class,'ID','Nationality');

    }
}
