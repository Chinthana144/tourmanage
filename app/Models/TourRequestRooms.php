<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequestRooms extends Model
{
    protected $fillable = [
        'tour_request_id',
        'room_type_id',
        'bed_type_id',
        'adult_count',
        'children_count',
        'extra_bed_count',
        'room_quantity',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }

    public function bedType()
    {
        return $this->belongsTo(BedTypes::class, 'bed_type_id');
    }
}//class
