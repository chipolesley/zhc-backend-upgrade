<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    /**
     *  The table associated with the ProductDetail Model
     */
    protected $table = 'tblbookingdetail';

    /**
     *  Each Product Line Item _has_One Product or Service
     */
    public function  ProductOrService(): HasOne
    {
        return $this->hasOne(ProductOrService::class,'ProductID','ProductID');
    }

    /**
     *  Each Product Line has JourneyTo
     */
    public function  TransferTo(): HasOne
    {
        return $this->hasOne(TransferTo::class,'tid','JourneyTo');
    }

    /**
     *  Each Product Line has JourneyFrom
     */
    public function  TransferFrom(): HasOne
    {
        return $this->hasOne(TransferFrom::class,'tid','JourneyFrom');
    }

    /**
     *  Each Product Line has a Pilot
     */
    public function  Pilot(): HasOne
    {
        return $this->hasOne(Pilot::class,'staffid','pilot');
    }

    /**
     *  Each Product Line has an Aircraft
     */
    public function  Aircraft(): HasOne
    {
        return $this->hasOne(Aircraft::class,'ID','aircraft');
    }

    /**
     *  get the booking for this line item
     */
    public function Booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class,'BookingID','BookingID');
    }
}
