<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    public function tourTransport()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }
    public function tourCountries()
    {
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    protected $fillable = [
        'name',
        'image',
        'num_day',
        'transport_id',
        'description',
        'num_day',
        'price',
        'countries_id',
    ];
}
