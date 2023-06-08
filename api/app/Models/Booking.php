<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Booking extends Model
{
    /**
     *  The table associated with the Booking Model
     */
    protected $table = 'tblbooking';

    /**
     *  Booking _has_many line items
     */
    public function  ProductDetail(): HasMany
    {
        return $this->hasMany(ProductDetail::class,'BookingID','BookingID');
    }

    /**
     *  Booking _has_on agent
     */
    public function  Agent(): HasOne
    {
        return $this->hasOne(Agent::class,'ID','AgentID');
    }

    /**
     *  Booking _has_on consultant
     */
    public function  Consultant(): HasOne
    {
        return $this->hasOne(Consultant::class,'ID','DoneBy');
    }

    /**
     *  Booking _has_on agent consultat
     */
    public function  AgentConsultant(): HasOne
    {
        return $this->hasOne(AgentConsultant::class,'ID','Consultant');
    }

    /**
     *  Booking _has_ nationality
     */
    public function  Nationality(): HasMany
    {
        return $this->hasMany(Nationality::class,'ID','Nationality');
    }

    /**
     *  Booking _has_ correspondences
     */
    public function  Correspondence(): HasMany
    {
        return $this->hasMany(Correspondence::class,'ID','BookingID');
    }


    /**
     *  Booking _has_ currency
     */
    public function  Currency(): HasOne
    {
        return $this->hasOne(Currency::class,'CurrencyID','Currency');
    }

    /**
     *  Booking _has_on consultant who updated it last
     */
    public function  ConsultantUpdatedBy(): HasOne
    {
        return $this->hasOne(ConsultantUpdatedBy::class,'ID','LastUpdatedBy');
    }

}
