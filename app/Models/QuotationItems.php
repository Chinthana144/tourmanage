<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationItems extends Model
{
    protected $fillable = [
        'quotation_id',
        'tour_package_id',
        'item_type',
        'amount',
    ];  

    public function item()
    {
        return $this->morphTo();
    }

    public function quotation()
    {
        return $this->belongsTo(Quotations::class, 'quotation_id');
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackages::class, 'tour_package_id');
    }
}//class
