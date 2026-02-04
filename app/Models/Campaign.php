<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount'
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function progress()
    {
        return round(($this->current_amount / $this->target_amount) * 100, 2);
    }
}
