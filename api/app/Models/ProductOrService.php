<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductOrService extends Model
{
    /**
     *  The table associated with the ProductOrService Model
     * @var string
     */
    protected $table = 'tblproduct';

    /**
     *  get the Product Detail for  for this product
     */

    public function  ProductDetail(): BelongsTo
    {
        return $this->belongsTo(ProductDetail::class,'ProductID','ProductID');
    }

}
