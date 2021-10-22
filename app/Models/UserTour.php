<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTour extends Model
{
    use HasFactory;

    protected $table = 'user_tours';

    protected $fillable = [
        'user_id',
        'tour_id',
        'num_people',
        'hotel_id',
        'phone_number',
        'start_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
